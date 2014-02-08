// web.js

// set up ========================
var express  = require('express');
var logfmt = require("logfmt");
var app      = express(); 								// create our app w/ express


// configuration =================
app.use(logfmt.requestLogger());

app.configure(function() {
	app.use(express.static(__dirname + '/public/app')); 		// set the static files location /public/img will be /img for users
	app.use(express.logger('dev')); 						// log every request to the console
	app.use(express.bodyParser()); 							// pull information from html in POST
	app.use(express.methodOverride()); 						// simulate DELETE and PUT
});

// app.get('/', function(req, res) {
//   res.send('Hello World!');
// });

var port = Number(process.env.PORT || 5000);
app.listen(port, function() {
  console.log("Listening on " + port);
});