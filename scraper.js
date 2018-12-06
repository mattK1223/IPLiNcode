
function(url)
{
	const rp = require('request-promise');
	
	rp(url)
  .then(function(html){
    //success!
    console.log(html);
  })
  .catch(function(err){
    //handle error
  });
}
