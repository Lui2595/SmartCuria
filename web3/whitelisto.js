/* Moralis init code */





const serverUrl = "https://npv9t1uqaxyg.usemoralis.com:2053/server";
const appId = "DRdTjpDPg93DHxkHKdGwnujQUToP7ePGTcmCnwcy";

Moralis.start({ serverUrl, appId });
//@dev conertir whitelist en una variable persistente
let whitelist = [];
const espacios= 360;
//@dev conertir espaciosGanados en una variable persistente
let espaciosGanados=-1;
let participacion="0";


const user = Moralis.User.current();

//params
const addressDonation="0xee8dc370D953144908413629F214B22B41043E93";


//elementos html
const loginBtn =document.getElementById("btn-login");
const loginBtn2 =document.getElementById("btn-login2");
const donar = document.getElementById("Donar");
const donarImg = document.getElementById("donar_img");


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
        //console.log(response.text());
        response.text().then(json => {
          //console.log(json);
          espaciosGanados = json;
          espaciosText.innerHTML=`${espacios}/ ${espaciosGanados}`;
        });
    }});
}
getWhitelistOccupied();

async function isWhiteListedd(wallet){
  fetch('https://smartcuria.com/api/public/whitelist/'+wallet, {
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
            whitelistText.innerHTML=`You are already in the Whitelist`;
            donar.classList.add("disabled-link") ;
            donarImg.src="images/whitelisted-gray.png"; 
            console.log("si")
          }
          if(participacion=='no'){
            console.log("no")
            donar.classList.remove("disabled-link") ;
            donarImg.src="images/whitelisted-blue.png";           
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
        $("#exampleModal").modal("show")
        $("#mensaje_modal").html('Instala Metamask </br><a href="https://metamask.io/"  target="_blank"><img src="images/MetaMask_Fox.png" height="50px" alt=""></a>')
        return;
    }
 
    const web3 = await Moralis.enableWeb3().catch(error=>console.log(error));
    if(!web3){
        console.log('Inicia sesion con metamask');
        $("#exampleModal").modal("show")
        $("#mensaje_modal").html("Inicia sesión con Metamask")

      //@dev aqui insertar que pasa cuando metamask no esta instalado
        return;
    }
};
web3Enable();

//Logout
async function logout() {
  Moralis.User.logOut();
  loginBtn.innerHTML='<img height="40px" src="images/login-white.png"   onmouseover="this.src=\'images/login-orang.png\'" onmouseout="this.src=\'images/login-white.png\'">'
  loginBtn2.innerHTML='<img height="40px" src="images/login-white.png"   onmouseover="this.src=\'images/login-orang.png\'" onmouseout="this.src=\'images/login-white.png\'">'
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
    donar.classList.add("disabled-link") ;
    if(participacion =='si' || participacion=='0'){console.log("Ya estas en la whitelist");  }
    if(espaciosGanados>=espacios || espaciosGanados==-1){console.log("Whitelist is full");  }
    let isUsingBSC =await usingBSC();
    if(!isUsingBSC){console.log("Es necesario tener la binance smart chain");return;}
    
    console.log('isUsingBSC');
    let user = Moralis.User.current();
    if(!user){console.log("Inicia sesion con metamask"); return;}
    let wallet = user.get('ethAddress');
 
    const options = {type: "erc20", 
                   amount: Moralis.Units.Token("1", "18"), 
                   receiver: addressDonation,
                   contractAddress: "0x55d398326f99059fF775485246999027B3197955",
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
          
      
          
          
        })
        .on("confirmation", (confirmationNumber, receipt) => { 
          console.log("Transaccion correcta");
          postData("https://smartcuria.com/api/public/whitelist/participar",{wallet: user.get('ethAddress')})
          .then(data=>{
            console.log(data);
            isWhiteListedd(user.get('ethAddress'));
           getWhitelistOccupied(); 
          })
          .catch(function(error){
            console.log('asasas'+error+'assas');
            donar.classList.remove("disabled-link") 
          });
           
         })
        .on("error", (error) => { 
          console.log(error);
          donar.classList.remove("disabled-link") 
          //@dev que pasa cuando no se logra la transacción 
         });
         
      } catch (error) {
        console.log(error);
        if(error.data.code==3 ){
          console.log("fondos insuficientes")
          donar.classList.remove("disabled-link") ;
        }
      }
    
}
donar.addEventListener('click',()=> {
  
  transfer()
});

//login/logout
async function login(event) {
    event.preventDefault()
    await usingBSCinit();

    let user = Moralis.User.current();
    Moralis.enableWeb3();
    
    if (!user) {
     
      user = await Moralis.authenticate({
        signingMessage: "SmartCuria",
      })
        .then(function (user) {
          usingBSC();
          
          console.log("logged in user:", user);
          console.log(user.get("ethAddress"));
          isWhiteListedd(user.get('ethAddress'));
          loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
          loginBtn2.innerHTML=cutWalletAddress(user.get("ethAddress"));
        })
        .catch(function (error) {
          //@dev que pasa cuando se tiene un error al iniciar usuario/ mestamask desactivado
          console.log(error);
        });
    }else{
  
      await logout();
  
    }
  
}
loginBtn.addEventListener('click',()=>login(event));
if (user) {
  loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
  loginBtn2.innerHTML=cutWalletAddress(user.get("ethAddress"));
}else{
  loginBtn.innerHTML='<img height="40px" src="images/login-white.png"   onmouseover="this.src=\'images/login-orang.png\'" onmouseout="this.src=\'images/login-white.png\'">'
  loginBtn2.innerHTML='<img height="40px" src="images/login-white.png"   onmouseover="this.src=\'images/login-orang.png\'" onmouseout="this.src=\'images/login-white.png\'">'
}
loginBtn2.addEventListener('click',()=>login(event));
if (user) {
  loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
  loginBtn2.innerHTML=cutWalletAddress(user.get("ethAddress"));
}else{
  loginBtn.innerHTML='<img height="40px" src="images/login-white.png"   onmouseover="this.src=\'images/login-orang.png\'" onmouseout="this.src=\'images/login-white.png\'">'
  loginBtn2.innerHTML='<img height="40px" src="images/login-white.png"   onmouseover="this.src=\'images/login-orang.png\'" onmouseout="this.src=\'images/login-white.png\'">'
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
