# RandomCode
========

To use DomainAPI.php

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
