/* Moralis init code */



const serverUrl = "https://gdkstm8vbyo2.usemoralis.com:2053/server";
const appId = "j8uGOO8SeEKBOk282fYCNqeO174K5lhjwfz8k1wS";

Moralis.start({ serverUrl, appId });


const user = Moralis.User.current();


//elementos html
const saldo = document.getElementById("Saldo");
const aprobar = document.getElementById("aprobar");
const pagar = document.getElementById("pagar");
const pagarTransfer = document.getElementById("pagarT");


const loginBtn =document.getElementById("btn-login");
const logoutBtn =document.getElementById("btn-logout");



//contrato de cobro
const contractAbi = [
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "amount",
				"type": "uint256"
			}
		],
		"name": "payErc20",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "retirarErc20",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"inputs": [],
		"name": "getBalance",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "_wallet",
				"type": "address"
			}
		],
		"name": "getDepositar",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "getWhilist",
		"outputs": [
			{
				"internalType": "address[]",
				"name": "",
				"type": "address[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "owner",
		"outputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
]

const address = "0x059B0e00A5aA7C780E4A178Ffe908A1fC6FfaA17";

//asegurarse de tener metamask
const connectWeb3Provider = async() => {
  const isMetaMaskInstalled= await Moralis.isMetaMaskInstalled();
  console.log(isMetaMaskInstalled)
};

//Esta usando la smart chain
async function usingBSC(){
  const chainId = await Moralis.getChainId();
  if(chainId!=97){
    const chainIdHex = await Moralis.switchNetwork("0x61"); 
    console.log(chainIdHex)
  }
};

Moralis.onChainChanged(async (chainId) => {
  usingBSC();
  console.log(chainId);
});

//balance del contrato
const balance = async (abi, addressP, mostrarBalance) => {
  
  const web3 = await Moralis.enableWeb3();

  const contract = new web3.eth.Contract(abi, addressP);
  usingBSC();
  contract.methods.getBalance().call((error, result) => {

  const getBalance= result / Moralis.Units.ETH("1");

  mostrarBalance.innerHTML =`BUSD en el contrato : ${getBalance}$`;
  });

  const transactions = await Moralis.Web3API.account.getTransactions();
  console.log(transactions);
};


//cobrar al usuario
const pagarToken = async (abi, addressP) => {
  const user=Moralis.User.current();
  if(user){
    const web3 = await Moralis.enableWeb3();

    const contract = new web3.eth.Contract(abi, addressP);
  
   
    contract.methods
      .payErc20(Moralis.Units.ETH("1"))
      .send({ from: user.get("ethAddress") })
      .on("transactionHash", function (hash) {

          alert(`su ${hash}`);

      })
      .on("confirmation", function (confirmationNumber, receipt) {
        
      })
      .on("receipt", function (receipt) {

          alert("pago completado");

      })
      .on("error", function (error, receipt) {
     

      });
    }else{
      alert('logee');
    }

};


//contrato erc20 busd
const contractAbiToken = [
  {
    constant: false,
    inputs: [],
    name: "disregardProposeOwner",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "name",
    outputs: [{ name: "", type: "string" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [
      { name: "_spender", type: "address" },
      { name: "_value", type: "uint256" },
    ],
    name: "approve",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "assetProtectionRole",
    outputs: [{ name: "", type: "address" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "totalSupply",
    outputs: [{ name: "", type: "uint256" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [
      { name: "r", type: "bytes32[]" },
      { name: "s", type: "bytes32[]" },
      { name: "v", type: "uint8[]" },
      { name: "to", type: "address[]" },
      { name: "value", type: "uint256[]" },
      { name: "fee", type: "uint256[]" },
      { name: "seq", type: "uint256[]" },
      { name: "deadline", type: "uint256[]" },
    ],
    name: "betaDelegatedTransferBatch",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [
      { name: "sig", type: "bytes" },
      { name: "to", type: "address" },
      { name: "value", type: "uint256" },
      { name: "fee", type: "uint256" },
      { name: "seq", type: "uint256" },
      { name: "deadline", type: "uint256" },
    ],
    name: "betaDelegatedTransfer",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [
      { name: "_from", type: "address" },
      { name: "_to", type: "address" },
      { name: "_value", type: "uint256" },
    ],
    name: "transferFrom",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [],
    name: "initializeDomainSeparator",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "decimals",
    outputs: [{ name: "", type: "uint8" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [],
    name: "unpause",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_addr", type: "address" }],
    name: "unfreeze",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [],
    name: "claimOwnership",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_newSupplyController", type: "address" }],
    name: "setSupplyController",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "paused",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [{ name: "_addr", type: "address" }],
    name: "balanceOf",
    outputs: [{ name: "", type: "uint256" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [],
    name: "initialize",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [],
    name: "pause",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "getOwner",
    outputs: [{ name: "", type: "address" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [{ name: "target", type: "address" }],
    name: "nextSeqOf",
    outputs: [{ name: "", type: "uint256" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_newAssetProtectionRole", type: "address" }],
    name: "setAssetProtectionRole",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_addr", type: "address" }],
    name: "freeze",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "owner",
    outputs: [{ name: "", type: "address" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "symbol",
    outputs: [{ name: "", type: "string" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_newWhitelister", type: "address" }],
    name: "setBetaDelegateWhitelister",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_value", type: "uint256" }],
    name: "decreaseSupply",
    outputs: [{ name: "success", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [{ name: "_addr", type: "address" }],
    name: "isWhitelistedBetaDelegate",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [
      { name: "_to", type: "address" },
      { name: "_value", type: "uint256" },
    ],
    name: "transfer",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_addr", type: "address" }],
    name: "whitelistBetaDelegate",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_proposedOwner", type: "address" }],
    name: "proposeOwner",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_value", type: "uint256" }],
    name: "increaseSupply",
    outputs: [{ name: "success", type: "bool" }],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "betaDelegateWhitelister",
    outputs: [{ name: "", type: "address" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "proposedOwner",
    outputs: [{ name: "", type: "address" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_addr", type: "address" }],
    name: "unwhitelistBetaDelegate",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [
      { name: "_owner", type: "address" },
      { name: "_spender", type: "address" },
    ],
    name: "allowance",
    outputs: [{ name: "", type: "uint256" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [{ name: "_addr", type: "address" }],
    name: "wipeFrozenAddress",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "EIP712_DOMAIN_HASH",
    outputs: [{ name: "", type: "bytes32" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [{ name: "_addr", type: "address" }],
    name: "isFrozen",
    outputs: [{ name: "", type: "bool" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: true,
    inputs: [],
    name: "supplyController",
    outputs: [{ name: "", type: "address" }],
    payable: false,
    stateMutability: "view",
    type: "function",
  },
  {
    constant: false,
    inputs: [],
    name: "reclaimBUSD",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function",
  },
  {
    inputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "constructor",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "from", type: "address" },
      { indexed: true, name: "to", type: "address" },
      { indexed: false, name: "value", type: "uint256" },
    ],
    name: "Transfer",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "owner", type: "address" },
      { indexed: true, name: "spender", type: "address" },
      { indexed: false, name: "value", type: "uint256" },
    ],
    name: "Approval",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "currentOwner", type: "address" },
      { indexed: true, name: "proposedOwner", type: "address" },
    ],
    name: "OwnershipTransferProposed",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [{ indexed: true, name: "oldProposedOwner", type: "address" }],
    name: "OwnershipTransferDisregarded",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "oldOwner", type: "address" },
      { indexed: true, name: "newOwner", type: "address" },
    ],
    name: "OwnershipTransferred",
    type: "event",
  },
  { anonymous: false, inputs: [], name: "Pause", type: "event" },
  { anonymous: false, inputs: [], name: "Unpause", type: "event" },
  {
    anonymous: false,
    inputs: [{ indexed: true, name: "addr", type: "address" }],
    name: "AddressFrozen",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [{ indexed: true, name: "addr", type: "address" }],
    name: "AddressUnfrozen",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [{ indexed: true, name: "addr", type: "address" }],
    name: "FrozenAddressWiped",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "oldAssetProtectionRole", type: "address" },
      { indexed: true, name: "newAssetProtectionRole", type: "address" },
    ],
    name: "AssetProtectionRoleSet",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "to", type: "address" },
      { indexed: false, name: "value", type: "uint256" },
    ],
    name: "SupplyIncreased",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "from", type: "address" },
      { indexed: false, name: "value", type: "uint256" },
    ],
    name: "SupplyDecreased",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "oldSupplyController", type: "address" },
      { indexed: true, name: "newSupplyController", type: "address" },
    ],
    name: "SupplyControllerSet",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "from", type: "address" },
      { indexed: true, name: "to", type: "address" },
      { indexed: false, name: "value", type: "uint256" },
      { indexed: false, name: "seq", type: "uint256" },
      { indexed: false, name: "fee", type: "uint256" },
    ],
    name: "BetaDelegatedTransfer",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [
      { indexed: true, name: "oldWhitelister", type: "address" },
      { indexed: true, name: "newWhitelister", type: "address" },
    ],
    name: "BetaDelegateWhitelisterSet",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [{ indexed: true, name: "newDelegate", type: "address" }],
    name: "BetaDelegateWhitelisted",
    type: "event",
  },
  {
    anonymous: false,
    inputs: [{ indexed: true, name: "oldDelegate", type: "address" }],
    name: "BetaDelegateUnwhitelisted",
    type: "event",
  },
];

const addressToken = "0xeD24FC36d5Ee211Ea25A80239Fb8C4Cfd80f12Ee";

// aprobar transferencia
const appro = async (abi, addressP, addressContra) => {
  const user=Moralis.User.current();
  if(user){

    const web3 = await Moralis.enableWeb3();
    const contract = new web3.eth.Contract(abi, addressP);
    
      contract.methods
      .approve(addressContra, Moralis.Units.ETH("10"))
      .send({ from: user.get("ethAddress") })
      .on("transactionHash", function (hash) {
          alert(`su ${hash}`);
      })
      .on("confirmation", function (confirmationNumber, receipt) {
        
      })
      .on("receipt", function (receipt) {
          alert("completado");
      })
      .on("error", function (error, receipt) {
     
      });


  }else{

    alert('logee');

  }
 
};


// ejecutores de funciones

connectWeb3Provider();
balance(contractAbi, address, saldo);

aprobar.addEventListener("click", () => {
  appro(contractAbiToken, addressToken, address);
});

pagar.addEventListener("click", () => {
  pagarToken(contractAbi, address);
});



if (user) {
  loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
}else{
  loginBtn.innerHTML='Login'
}

//Metodo de pago con transfer
async function transfer(){
  let user = Moralis.User.current();
  var wallet = user.get('ethAddress');
  console.log(wallet);
  const options = {type: "erc20", 
                 amount: Moralis.Units.Token("1", "18"), 
                 receiver: "0x53b8A7e7A9495FB59D85e1AA82397135004d8075",
                 contractAddress: "0x337610d27c682E347C9cD60BD4b3b107C9d34dDd"
    }
  let tx = await Moralis.transfer(options)
  tx.on("transactionHash", (hash) => {  })
  .on("receipt", (receipt) => {  })
  .on("confirmation", (confirmationNumber, receipt) => {  })
  .on("error", (error) => {  });
}
pagarTransfer.addEventListener('click',()=>transfer());
/* Authentication code */
async function login() {

  let user = Moralis.User.current();

  if (!user) {
    user = await Moralis.authenticate({
      signingMessage: "hola mundo",
    })
      .then(function (user) {

        console.log("logged in user:", user);
        console.log(user.get("ethAddress"));

        loginBtn.innerHTML=cutWalletAddress(user.get("ethAddress"));
      })
      .catch(function (error) {
        console.log(error);
      });
  }else{

    await Moralis.User.logOut();
    loginBtn.innerHTML='Login'

    console.log("logged out");

  }

}

loginBtn.addEventListener('click',()=>login());


// async function logOut() {

//   await Moralis.User.logOut();

//   console.log("logged out");
// }

// logoutBtn.addEventListener('click',()=>logOut());





