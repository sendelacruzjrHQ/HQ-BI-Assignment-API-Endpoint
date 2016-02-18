--------------------------------
BI Assignment - 3.0 API endpoint
--------------------------------

Language used : PHP<br>
Objectives :	
-The endpoint should expose some of the data from the newly created table valid_offers based on the request parameters.<br> 
-It should return a JSON response with the best deal (discount) for the hotel/checkin/checkout parameters.<br> 
-In other words - this API endpoint should return the offer with the best discount.<br>

Request GET parameters:<br>

hotelId<br>
checkinDate<br>
checkoutDate<br>

Create an endpoint /offer/best-deal with example GET params:<br>

/offer/best-deal.php?hotelId=1234&checkinDate=2015-11-11&checkoutDate=2015-11-12<br>

JSON output which your new endpoint should return:<br>

{<br>
    offerId: 12345678,<br>
    hotelId: 1234,<br>
    checkinDate: '2015-11-11',<br>
    checkoutDate: '2015-11-12',<br>
    sellingPrice: 234.34,<br>
    currencyCode: 'USD'<br>
}<br>

Steps :<br>
1. Download and setup PHP package version 5.6 from the link below: <br>
http://windows.php.net/download/ <br>
2. Create a handler mapping for PHP(please refer to attached word document)<br>
3. Install PHP Manager for IIS (msi file)<br>
4. Add and enable SQL drivers for PHP via IIS==>PHP Manager==>PHP Extensions==>Add then Enable<br>
	(a) php_sqlsrv_56_ts.dll<br>
	(b) php_sqlsrv_56_nts.dll<br>
5. Install ODBC driver for SQL Server (msi file)<br>
6. Copy offer folder to C:\inetpub\wwwroot<br>
7. Change the value of variable $svr(on php file) with the servername where database is created <br>
8. Browse localhost and test <br>
ex. http://localhost/offer/best-deal.php?hotelId=71&checkinDate=2015-10-16&checkoutDate=2015-10-17<br>

*** Any issue please send email to sendelacruzjr@gmail.com

