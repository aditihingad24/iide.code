var express = require('express');
var app = express();
var chai = require('chai');
let jsonData = require('./basic-html-and-html5.json')
var jsdom = require("jsdom");
var cors = require('cors')

app.use(cors())
var bodyParser = require('body-parser');
app.use(bodyParser.json()); // support json encoded bodies

app.use(bodyParser.urlencoded({ extended: false })); // support encoded bodies

app.post('/', function (req, res) {
  var code = req.body.code;
  var id = req.body.id;
	
  const { JSDOM } = jsdom;
  const { window } = new JSDOM(code);

const { document } = (new JSDOM()).window;

var $ = jQuery = require('jquery')(window);
  //  console.log($('h1').text());
  global.document = document;
  //console.log(document);
   var data = jsonData;
   res.setHeader("Content-Type", "text/json");
      
       var err = '';

       for(var x = 0; x < data['challenges'].length; x++){
         if(data['challenges'][x]['id'] == id){
			 
           try{
             for(var i = 0; i<data['challenges'][x]['tests'].length; i++){

              err = data['challenges'][x]['tests'][i]['text'];
			
               eval('chai.'+data['challenges'][x]['tests'][i]['testString']);
             }
           }catch(e){
             if(e == ''){
               res.end('Correct!');
             }else{
               //console.log(err);
               res.send(JSON.stringify(err));

             }
           }
         }
       }






  res.end(JSON.stringify('ok'));

//console.log($('h1').text());


 });
app.get('/test', function (req, res) {
	var code = "<!DOCTYPE html> <html> <head> <title></title> <style>   h2 {color: rgb(0,0,255);} </style> </head> <body> <h2>CatPhotoApp</h2> <main> <p>Click here to view more <a href='#'>cat photos</a>.</p> <a href='#'><img src='https://bit.ly/fcc-relaxing-cat' alt='A cute orange cat lying on its back.'></a> <div> <p>Things cats love:</p> <ul> <li>cat nip</li> <li>laser pointers</li> <li>lasagna</li> </ul> <p>Top 3 things cats hate:</p> <ol> <li>flea treatment</li> <li>thunder</li> <li>other cats</li> </ol> </div> <form action='/submit-cat-photo'><label><input type='radio' name='indoor-outdoor' checked> Indoor</label> <label><input type='radio' name='indoor-outdoor'> Outdoor</label><br> <label><input type='checkbox' name='personality' checked> Loving</label> <label><input type='checkbox' name='personality'> Lazy</label> <label><input type='checkbox' name='personality'> Energetic</label><br> <input type='text' placeholder='cat photo URL' required=''> <button type='submit'>Submit</button></form> </main> </body> </html>";
	const { JSDOM } = jsdom;
  const { window } = new JSDOM(code);

const { document } = (new JSDOM()).window;

var $ = jQuery = require('jquery')(window);
    console.log($('style').text());
  global.document = document;
	
	try{
		chai.assert($("h2").css("color") === "rgb(0, 0, 255)", 'Your <code>h2</code> element should be blue.');
	}catch(e){
		 if(e == ''){
               res.end('Correct!');
             }else{
               //console.log(err);
               res.send(JSON.stringify(e.message));
				
             }
	}
	res.end(JSON.stringify("done"));
	
	
});


var server = app.listen(80, function () {
   var host = server.address().address
   var port = server.address().port

   console.log("Example app listenings at http://%s:%s", host, port)
})
