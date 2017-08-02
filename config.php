<?php

define('CART_COOKIE', 'SBwi72UCklwiqzz2');
define('CART_COOKIE_EXPIRE', time() + (86400 * 30));

define('CURRENCY', 'hrk');
define('CHECKOUTMODE', 'TEST');

if (CHECKOUTMODE == 'TEST') {
	define('STRIPE_PRIVATE', 'sk_test_1CXDkxK5i0oMDdXwFMOG5HjM');
	define('STRIPE_PUBLIC', 'pk_test_6msZbIyHvNnZP0tqMwS0e4tt');
}

if(CHECKOUTMODE == 'LIVE') {
	define('STRIPE_PRIVATE', '');
	define('STRIPE_PUBLIC', '');
}