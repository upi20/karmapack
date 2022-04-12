function betterParseFloat(x){
	  if(isNaN(parseFloat(x)) && x.length > 0)
		return betterParseFloat(x.substr(1));
	  return parseFloat(x);
	}
	function usd(x){
	  x = betterParseFloat(x);
	  if(isNaN(x))
		return "$0.00";
	  var dollars = Math.floor(x);
	  var cents = Math.round((x - dollars) * 100) + "";
	  if(cents.length==1)cents = "0"+cents;
	  return "$"+dollars+"."+cents;
	}