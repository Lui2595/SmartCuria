/* Moralis init code */


const serverUrl = "https://dcsj2mnakl0s.usemoralis.com:2053/server";
const appId = "xiH8YGD5fkGNfw1AynZHKCyK9fAso3kWjSxW6Ywf";

Moralis.start({ serverUrl, appId });
//@dev conertir whitelist en una variable persistente
let whitelist = [];
const espacios= 360;
//@dev conertir espaciosGanados en una variable persistente
let espaciosGanados=-1;
let participacion="0";


const user = Moralis.User.current();

//params
const addressDonation="0x53b8A7e7A9495FB59D85e1AA82397135004d8075";


//elementos html
const loginBtn =document.getElementById("btn-login");
const donar = document.getElementById("Donar");
donar.disabled =true;

const whitelistText = document.getElementById("isWhitelisted");
const espaciosText = document.getElementById("Espacios");
espaciosText.innerHTML=`${espacios}/ ${espaciosGanados}`;
//GET methods

async function getWhitelistOccupied(){
  fetch('https://smartcuria.com/api/public/whitelist', {
    method: 'GET',
    headers: {
        Accept: 'application/json',
    },
    },
    ).then(response => {
    if (response.ok) {
      constructor(params) {
        
      }
        response.text().then(json => {
          espaciosGanados = json.count;
          espaciosText.innerHTML=`${espacios}/ ${espaciosGanados}`;
        });
    }});
}
getWhitelistOccupied();

async function isWhiteListedd(wallet){
  fetch('http://smartcuria.com/api/public/whitelist/'+wallet, {
    method: 'GET',
    headers: {
        Accept: 'application/json',
    },
    },
    ).then(response => {
      if (response.ok) {
        response.text().then(text=>{
          participacion=text;
          if(participacion=='si'){
            const whitelistText = document.getElementById("isWhitelisted");
            whitelistText.innerHTML=`Ya estas en la whitelist`;
            donar.disabled =true;
          }
          if(participacion=='no'){
            donar.disabled =false;
          }
        });
      }
    });
}
//POST methods
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

//enble web3
const web3Enable = async () => {
    
    const isMetaMaskInstalled= await Moralis.isMetaMaskInstalled().catch(error=>console.log(error));
    if(!isMetaMaskInstalled){
        console.log('Instala metamask');
      //@dev aqui insertar que pasa cuando metamask no esta instalado
        return;
    }
 
    const web3 = await Moralis.enableWeb3().catch(error=>console.log(error));
    if(!web3){
        console.log('Inicia sesion con metamask');
      //@dev aqui insertar que pasa cuando metamask no esta instalado
        return;
    }
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
  const chainId = 97;
  const chainName = "Smart Chain - Testnet";
  const currencyName = "BNB";
  const currencySymbol = "BNB";
  const rpcUrl = "https://data-seed-prebsc-1-s1.binance.org:8545/";
  const blockExplorerUrl = "https://testnet.bscscan.com";

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
    if(chainId!=97){
      try {
        const chainIdHex = await Moralis.switchNetwork("0x61"); 
      } catch(err) {
        //@dev que pasa cuando no esta dada de alta la red
        console.log(err);
        await addBSC();
        return false;
      }
      return false;
    }
    return true;
};
async function usingBSCinit(){
  const chainId = await Moralis.getChainId();
  if(chainId!=97){
    console.log("no estas en la chain correcta")
  }
  
};


//metodo para cortar la wallet
function cutWalletAddress(wallet) {
  return "Logout ("+wallet.slice(0,5)+"..."+wallet.slice(38,42)+")";
}




//funcion de transferir a otraa wallet
async function transfer(){
    donar.disabled =true;
    if(participacion =='si' || participacion=='0'){console.log("Ya estas en la whitelist");  donar.disabled =false;return;}
    if(espaciosGanados>=espacios || espaciosGanados==-1){console.log("Whitelist is full");  donar.disabled =false;return;}
    let isUsingBSC =await usingBSC();
    if(!isUsingBSC){console.log("Es necesario tener la binance smart chain");return;}
    
    console.log('isUsingBSC');
    let user = Moralis.User.current();
    if(!user){console.log("Inicia sesion con metamask"); return;}
    let wallet = user.get('ethAddress');
 
    const options = {type: "erc20", 
                   amount: Moralis.Units.Token("1", "18"), 
                   receiver: addressDonation,
                   contractAddress: "0x337610d27c682E347C9cD60BD4b3b107C9d34dDd",
                   awaitReceipt: false
      }
  
      try {
        let tx = await Moralis.transfer(options); 
        // const res= await tx.wait();
        // console.log(res);
        tx.on("transactionHash", (hash) => { 

         })
        .on("receipt", (receipt) => { 
          //@dev que pasa cuando se logra la transacción 
          //console.log(receipt)
          
          postData("https://smartcuria.com/api/public/whitelist/participar",{wallet: user.get('ethAddress')})
          .then(data=>{
            console.log(data);
            isWhiteListedd(user.get('ethAddress'));
           getWhitelistOccupied(); 
          })
          .catch(function(error){
            console.log('asasas'+error+'assas');
          });
           
          
          
        })
        .on("confirmation", (confirmationNumber, receipt) => { 
          console.log("Transaccion correcta");

         })
        .on("error", (error) => { 
          console.log(error);
          donar.disabled =false;
          //@dev que pasa cuando no se logra la transacción 
         });
         donar.disabled =false;
      } catch (error) {
        console.log(error);
        if(error.data.code==3 ){
          console.log("fondos insuficientes")

        }
      }
    
}
donar.addEventListener('click',()=> {
  donar.disabled=true;
  transfer()
});

//login/logout
async function login() {
    await usingBSCinit();

    let user = Moralis.User.current();
    Moralis.enableWeb3();
    
    if (!user) {
     
      user = await Moralis.authenticate({
        signingMessage: "hola mundo",
      })
        .then(function (user) {
          usingBSC();
          
          console.log("logged in user:", user);
          console.log(user.get("ethAddress"));
          isWhiteListedd(user.get('ethAddress'));
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
  logout();
  usingBSC();
  console.log(chainId);
});

//Desconexión
Moralis.onDisconnect(async function (accounts) {
  await logout();
});

Moralis.onConnect(async function (accounts) {
  await logout();
});
//Camvio de cuenta
Moralis.onAccountsChanged(async function (accounts) {
  await logout();
});
