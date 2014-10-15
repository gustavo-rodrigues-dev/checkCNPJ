String.prototype.mask = function(m) {
    var m, l = (m = m.split("")).length, s = this.split(""), j = 0, h = "";
    for(var i = -1; ++i < l;)
        if(m[i] != "#"){
            if(m[i] == "\\" && (h += m[++i])) continue;
            h += m[i];
            i + 1 == l && (s[j - 1] += h, h = "");
        }
        else{
            if(!s[j] && !(h = "")) break;
            (s[j] = h + s[j++]) && (h = "");
        }
    return s.join("") + h;
};

function getUrlData(callback){
	var _default = {
			typeData : {},
			basePath : window.location.pathname
		},
 
	base = window.location,
	local = base.href.replace(base.origin+_default.basePath, '').split(/[?,&,#]/),
	dados = _default.typeData;
 
	for(var x in local){
		if(local != undefined){
			var bit = local[x].split('=');
			if(bit[0] != ''){
				dados[bit[0]] = bit[1];
			}
		}
	}
	if (typeof callback == 'function') { 
		return callback(dados);
	} 
	return dados;
}