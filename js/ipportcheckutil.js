function checkportinput(port_string) {
	var c;
	var ch = "0123456789";
	if (port_string.length == 0)
		return false;
	for (var i = 0; i < port_string.length; i++) {
		c = port_string.charAt(i);
		if (ch.indexOf(c) == -1)
			return false;
	}
	if (parseInt(port_string, 10) <= -1 || parseInt(port_string, 10) >= 65536)
		return false;
	return true;
}
function checkipinput(ip_string) {
	var c;
	var n = 0;
	var ch = ".0123456789";
	if (ip_string.length < 7 || ip_string.length > 15)
		return false;
	for (var i = 0; i < ip_string.length; i++) {
		c = ip_string.charAt(i);
		if (ch.indexOf(c) == -1)
			return false;
		else {
			if (c == '.') {
				if (ip_string.charAt(i + 1) != '.') {
					n++;
				} else {
					return false;
				}
			}
		}
	}
	if (n != 3)
		return false;
	if (ip_string.indexOf('.') == 0
			|| ip_string.lastIndexOf('.') == (ip_string.length - 1))
		return false;
	szarray = [ 0, 0, 0, 0 ];
	var remain;
	var i;
	for (i = 0; i < 3; i++) {
		var n = ip_string.indexOf('.');
		szarray[i] = ip_string.substring(0, n);
		remain = ip_string.substring(n + 1);
		ip_string = remain;
	}
	szarray[3] = remain;
	for (i = 0; i < 4; i++) {
		if (szarray[i] < 0 || szarray[i] > 255) {
			return false;
		}
	}
	if (szarray[0] == 127) {
		return false;
	}
	if (szarray[0] >= 224 && szarray[0] <= 239) {
		return false;
	}
	return true;
};