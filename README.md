# RandomCode
========

To use DomainAPI.php, you need to obtain an APIKEY to authenticate, please contact me for one ( peter.laws@laws-hosting.co.uk )  
Very basic for now  .
  
// example, you will need to supply these somehow from the user  
   $domain = 'laws-hosting';  
   $tld = 'co.uk';  
  
// CREATE THE CLASS INSTANCE  
   $sxml = new lawshost();  
   
// to check domain availability, use  
   $result = $sxml->check_availability($domain,$tld);  
   print_r($result);  
  
// to get a list of our tld extensions, use  
   $result = $sxml->get_tlds();  
   print_r($result);  
  
=========
