


/* Moralis init code */

const serverUrl = "https://gdkstm8vbyo2.usemoralis.com:2053/server";
const appId = "j8uGOO8SeEKBOk282fYCNqeO174K5lhjwfz8k1wS";

Moralis.start({ serverUrl, appId });
//@dev conertir whitelist en una variable persistente
let whitelist = [];
let espacios= 360;
//@dev conertir espaciosGanados en una variable persistente
let espaciosGanados=0;


const user = Moralis.User.current();

//params
const addressDonation="0xee8dc370D953144908413629F214B22B41043E93";


//elementos html
const loginBtn =document.getElementById("btn-login");
const donar = document.getElementById("Donar");
const espaciosText = document.getElementById("Espacios");
espaciosText.innerHTML=`${espacios}/ ${espaciosGanados}`;


//enble web3
const web3Enable = async () => {
    
    const isMetaMaskInstalled= await Moralis.isMetaMaskInstalled();
    if(!isMetaMaskInstalled){
      //@dev aqui insertar que pasa cuando metamask no esta instalado
        return;
    }
    const web3 = await Moralis.enableWeb3();
};
web3Enable();

//Logout
async function logout() {
  Moralis.User.logOut();
  loginBtn.innerHTML='Login'
}

//Añadir binance smart chain
async function addBSC(){
  //Params para la testnet
  const chainId = 56;
  const chainName = "Smart Chain";
  const currencyName = "BNB";
  const currencySymbol = "BNB";
  const rpcUrl = "https://bsc-dataseed.binance.org/";
  const blockExplorerUrl = "https://bscscan.com";

  await Moralis.addNetwork(
    chainId, 
    chainName, 
    currencyName, 
    currencySymbol, 
    rpcUrl,
    blockExplorerUrl
  );
};

//Usar la binance smart chain
async function usingBSC(){
    const chainId = await Moralis.getChainId();
    if(chainId!=56){
      try {
        const chainIdHex = await Moralis.switchNetwork("0x38"); 
      } catch(err) {
        //@dev que pasa cuando no esta dada de alta la red
        console.log('asas',err);
        await addBSC();
        return false;
      }
      return false;
    }
    return true;
};
//metodo para cortar la wallet
function cutWalletAddress(wallet) {
  return "Logout ("+wallet.slice(0,5)+"..."+wallet.slice(38,42)+")";
}
//Revision de whitelist
function isInWhiteList( address){
    whitelist.forEach(function(inWhitelist){
        if(address==inWhitelist){
          //@dev que pasa cuando esta en la whitelist
            return true;
        }
    });
    //@dev que pasa cuando no esta en la whitelist
    return false;
}

//El cupo esta lleno?
function isWhiteListFull(){
  if(espaciosGanados>=espacios){
    return true;
  }
  return false;
}

async function postData(url, data) {
  // Opciones por defecto estan marcadas con un *
  const response = await fetch(url, {
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *same-origin, omit
    headers: {
      'Content-Type': 'application/json'
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify(data) // body data type must match "Content-Type" header
  });
  return response; // parses JSON response into native JavaScript objects
}


//funcion de transferir a otraa wallet
async function transfer(){
    let isFull= isWhiteListFull();
    if(isFull){console.log("Whitelist is full");return;}
    let isUsingBSC =await usingBSC();
    if(!isUsingBSC){console.log("Es necesario tener la binance smart chain");return;}
    console.log('isUsingBSC');
    let user = Moralis.User.current();
    let wallet = user.get('ethAddress');
    let isWhitelisted= isInWhiteList(wallet);
    if(isWhitelisted){console.log("Already in whiteList");return;}
    const options = {type: "erc20", 
                   amount: Moralis.Units.Token("1", "18"), 
                   receiver: addressDonation,
                   contractAddress: "0x55d398326f99059fF775485246999027B3197955",
                   awaitReceipt: false
      }
    let tx = await Moralis.transfer(options)
    tx.on("transactionHash", (hash) => {  })
    .on("receipt", (receipt) => { 
      //@dev que pasa cuando se logra la transacción 
      postData("smartcuria.com/api/public/whitelist/participar",{wallet: user.get('ethAddress')});
      whitelist.push(user.get('ethAddress'));
      espaciosGanados+=1;
      espaciosText.innerHTML=`${espacios}/ ${espaciosGanados}`;
      console.log(espaciosGanados); })
    .on("confirmation", (confirmationNumber, receipt) => { 

      
     })
    .on("error", (error) => { 
      //@dev que pasa cuando no se logra la transacción 
     });
}
donar.addEventListener('click',()=>transfer());

//login/logout
async function login() {
    
    let user = Moralis.User.current();
    
    
    if (!user) {
      usingBSC();
      user = await Moralis.authenticate({
        signingMessage: "hola mundo",
      })
        .then(function (user) {
  
          console.log("logged in user:", user);
          console.log(user.get("ethAddress"));
  
          loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
        })
        .catch(function (error) {
          //@dev que pasa cuando se tiene un error al iniciar usuario/ mestamask desactivado
          console.log(error);
        });
    }else{
  
      await logout();
  
    }
  
}
loginBtn.addEventListener('click',()=>login());
if (user) {
  loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
}else{
  loginBtn.innerHTML='Login'
}

//on change network
Moralis.onChainChanged(async (chainId) => {
  usingBSC();
  console.log(chainId);
});
//Camvio de cuenta
Moralis.onAccountChanged(async function (accounts) {
  await logout();
});
//Desconexión
Moralis.onDisconnect(async function (accounts) {
  await logout();
});
