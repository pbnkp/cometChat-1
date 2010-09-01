<div id="title"><h1>cometChat</h1></div>
<div class="box" id="history"></div>
<input class="box" id="msg"/>

<script src="http://yourserver.com:8001/static/hookbox.js"></script>

<script>
// UTILITY
$ = function(id) { return /^</.test(id) ? document.createElement(id.substring(1, id.length - 1)) : document.getElementById(id); }
parseDateTime = function(datetime) { var d = new Date(Date.parse(datetime.replace('T', ' ').replace(/\-/g, '/'))), h = d.getHours(), m = d.getMinutes(), s = d.getSeconds(); if (m < 10) { m = '0' + m; }; if (s < 10) { s = '0' + s; }; return [h, m, s].join(':'); }

// UI
var inputEl = $('msg'),
	historyEl = $('history');

inputEl.onkeypress = function(e) {
	if ((e || window.event).keyCode == 13) {
		conn.publish('chat', inputEl.value);
		inputEl.value = '';
	}
}
var conn = hookbox.connect("http://yourserver.com:8001");

// NETWORK
onload = function() {
	conn.subscribe('chat');
	conn.onSubscribed = function(name, subscription) {
		subscription.onPublish = function(args) {
			var msg = document.createTextNode(
				parseDateTime(args.datetime) + ' '
				+ args.user + ': '
				+ args.payload);

			historyEl.insertBefore($('<div>'), historyEl.firstChild)
				.appendChild(msg);
		}
	}

	//conn.onOpen = function () { alert("connection established!"); }

	//conn.onError = function (err) { alert("connection error! " + err.msg); }
}

</script>