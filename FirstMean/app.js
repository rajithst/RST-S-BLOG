
var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');


var conn = mongoose.connect("localhost:27017/firstMean");

var User = require('./models/user');

var app = express();

app.use(bodyParser.json());

app.use(express.static(__dirname+"/public"));

app.post('/insertData',function (req,res) {

var Usertable = new User(req.body);
    Usertable.save(function(err,docs){
      console.log(docs);
      res.json(docs);
    })
  
})


app.listen(3000,function(){
  console.log("listening to port 3000");

});


