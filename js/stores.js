// Copy of Stores

var store_locs;
// This actually overrides the CMS setting, but we were getting unreliable values from CMS editors...
//var dataURL = '/ajax/stores_list';

// Used static cached file
var dataURL = '/ajax/static_stores.json';
var dataLoaded = false;
var noFade = false;

jQuery(document).ready(function($) {
	var $ = jQuery;
	
	jQuery.ajax({
			type: "GET",
			url: dataURL,
			dataType: "json",
			success: function(data){
				store_locs = data;
				dataLoaded = true;
			},
			error:function (xhr, ajaxOptions, thrownError){
				//log(thrownError);
			}
	});
	
	if($.browser.msie){
 		if($.browser.version < 9){
 			noFade = true;
 		}
 	}



	
});

jQuery("#zip-search").keyup(function () {
	var value = jQuery("#zip-search").val();

	while (value.length < 5 && value.length > 0){
		value += "0";
	}
	//i changed the value of 5 to 7 by tony 
	if (value.length > 7){
		value = value.slice(0,7);
		}
	//this was added by tony 
	if (value.length > 7){
		value = value.slice(a,z);
	}
		if (value.length > 7){
		value = value.slice(A,Z);
	}
	//added by tony up to the previous line
	
	log("RAW: "+value);
	
	if (value.length > 0){
		jQuery("#loc-results").html(getResults(value));
		look_for_outside_links();
	} else {
		jQuery("#loc-results").html("");
	}
}).keyup();


function findZip(_z){
	var _out = '';
	var _results = 0;
	var _outArray = [];
	var inZip = _z;
	
	//log("----");
	//log(dataLoaded);
	
	log("findZip: " + _z);
	
	if (store_locs && store_locs.nodes){
		for (s in store_locs.nodes) {
			//Check if all data exits
			if (store_locs.nodes[s] && store_locs.nodes[s].node && store_locs.nodes[s].node.field_sz){
				var obj = jQuery.parseJSON(store_locs);
				//var z = store_locs.stores[s].Zip;
				var z = store_locs.nodes[s].node.field_sz;
				if (z == _z){
					_outArray.push(store_locs.nodes[s].node);
				}
			}
		}
	}
	if (_outArray.length < 1){
		if (store_locs && store_locs.nodes){
			for (xs in store_locs.nodes) {
			
				if (store_locs.nodes[xs] && store_locs.nodes[xs].node && store_locs.nodes[xs].node.field_sz){
					//var obj = jQuery.parseJSON(store_locs);
					//var zString = store_locs.stores[xs].Zip;
					var zString = store_locs.nodes[xs].node.field_sz;
					//changing all the 10 to 6 by tony
					var zNum = parseInt(zString,10);
					//log("Pre-Parse: "+_z);
					var termNum = parseInt(_z,10);
					//log("Post-Parse: "+ parseInt(_z,10) );
					var zRange = 200;
					
					if (zNum < termNum + zRange && zNum > termNum - zRange){
						//log(termNum + " :-: " + zString + " :-: " +zNum);
						_outArray.push(store_locs.nodes[xs].node);
					}
					
				}
				
			}
		}

	}

	if (noFade == true){
		//_outArray = _outArray.slice(2,_outArray.length-1);
	}
	return _outArray;
}

function getResults(_z){
	log ("getResults: "+_z);
	
	var _results = findZip(_z);
	var _output = '';

	if (_results.length >= 1){
		for (i in _results){
			var r = _results[i];
			if (r.title){
				var _i = "<div class='loc_result'>";
				_i += "<h4>" + r.title + "</h4>";
				_i += "<p>";
				_i += r.field_sa + "<br/>";
				//_i += r.C + ", "+ r.S + " " + r.Zip +"<br/>";field_sz
				_i += r.field_sc + ", "+ r.field_ss + " " + r.field_sz +"<br/>";
				_i += "</p>";
				//var maplink = r.St + ",+" + r.C + ",+"+ r.S + "+" + r.Zip;
				var maplink = r.title + ",+" + r.field_sa + ",+" + r.field_sc + ",+"+ r.field_ss + "+" + r.field_sz;
				maplink = maplink.replace(/\s/g,"+"); // Replace spaces with + for link
				_i += "<a class='maplink curly button' href='http://maps.google.com/maps?q=" + maplink + "'>Map</a>";
				_i += "</div>";
				_i += "            ";
				_output += _i;
			}
		}
	} else {
		if (dataLoaded == true){
			_output = "Sorry there were no results for that zip code";
		} else {
			_output = "Still loading store data.";
		}
		//zNum = parseInt(_z);

	}

	return _output;

}
