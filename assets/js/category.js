/*
	*	Original script by: Shafiul Azam
	*	ishafiul@gmail.com
	*	Version 3.0
	*	Modified by: Luigi Balzano

	*	Description:
	*	Inserts Countries and/or States as Dropdown List
	*	How to Use:

		In Head section:
		<script type= "text/javascript" src = "countries.js"></script>
		In Body Section:
		Select Country:   <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
		<br />
		City/District/State: <select name ="state" id ="state"></select>
		<script language="javascript">print_country("country");</script>	

	*
	*	License: OpenSource, Permission for modificatin Granted, KEEP AUTHOR INFORMATION INTACT
	*	Aurthor's Website: http://shafiul.progmaatic.com
	*
*/

var country_arr = new Array("Vehicle", "Mobile Phone & Tablets", "Home, Furniture & Garden", "Real Estate", "Electronic & Video", "Job & Services", "Hobbies, Arts & Sports", "Animals & Pets", "Fashion & Beauty", "Others");

var s_a = new Array();
s_a[0]="";
s_a[1]="Cars|Cars Accesories|Motorcycles|Trucks, Commercial & Agricultural";
s_a[2]="Phones & Mobile Phones|Accessories|Tablets";
s_a[3]="Furniture|Home Appliances|Decor, Garden & Accesories|Office & Commercial Furniture|Agriculture & Farm Produce";
s_a[4]="Land|Houses & Apartments for Rent|Houses & Apartments for Sale|Office, Shops & Commercial|Short term & Holiday Rentals";
s_a[5]="Cameras & Accessories|Computers & Laptops|TV, Audio & Video|Video Games & Accessories";
s_a[6]="Offered Jobs|Seeking Work & CVs|Services|Classes & Courses";
s_a[7]="Books, CDs & DVDs|Musical Instruments|Art & Collectibles|Crafts|Sporting goods & Bicycles|Toys & Games";
s_a[8]="Dogs & Cats|Other Animals|Pet Accessories";
s_a[9]="Clothes|Shoes|Bags|Jewelries";
s_a[10]="Others";



function print_country(country_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(country_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select Category','');
	option_str.selectedIndex = 0;
	for (var i=0; i<country_arr.length; i++) {
		option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
	}
}

function print_state(state_id, state_index){
	var option_str = document.getElementById(state_id);
	option_str.length=0;	// Fixed by Julian Woods
	option_str.options[0] = new Option('Select Sub-category','');
	option_str.selectedIndex = 0;
	var state_arr = s_a[state_index].split("|");
	for (var i=0; i<state_arr.length; i++) {
		option_str.options[option_str.length] = new Option(state_arr[i],state_arr[i]);
	}
}
