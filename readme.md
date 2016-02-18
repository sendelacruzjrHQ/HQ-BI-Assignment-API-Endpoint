BI Assignment - 3.0 API endpoint

Language used	: PHP
Objectives		: The endpoint should expose some of the data from the newly created table valid_offers based on the request parameters. 
					It should return a JSON response with the best deal (discount) for the hotel/checkin/checkout parameters. 
					In other words - this API endpoint should return the offer with the best discount.

Request GET parameters:

hotelId
checkinDate
checkoutDate

Create an endpoint /offer/best-deal with example GET params:

/offer/best-deal.php?hotelId=1234&checkinDate=2015-11-11&checkoutDate=2015-11-12

JSON output which your new endpoint should return:

{
    offerId: 12345678,
    hotelId: 1234,
    checkinDate: '2015-11-11',
    checkoutDate: '2015-11-12',
    sellingPrice: 234.34,
    currencyCode: 'USD'
}

Steps :
1. Setup PHP, extract file php-5.6.18-nts-Win32-VC11-x86.zip
2. Create a handler mapping for PHP(please refer to attached word document)
3. Install PHP Manager for IIS (msi file)
4. Add and enable SQL drivers for PHP via IIS==>PHP Manager==>PHP Extensions==>Add then Enable
	(a) php_sqlsrv_56_ts.dll
	(b) php_sqlsrv_56_nts.dll
5. Install ODBC driver for SQL Server (msi file)
6. Copy offer folder to C:\inetpub\wwwroot
7. Change the value of variable $svr(on php file) with the servername where database is created 
7. Browse localhost and test ex. http://localhost/offer/best-deal.php?hotelId=71&checkinDate=2015-10-16&checkoutDate=2015-10-17

*** Any issue please send email to sendelacruzjr@gmail.com

