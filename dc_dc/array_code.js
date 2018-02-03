var txt = [];
   var flag;
   var sorted;

	function showModel(text){
		document.getElementById('hidden_layer').style.display='block';
		document.getElementById('content').innerHTML=text;
	}

   function weight( str ) {
    var retArray = [];	 
   for( var i = 0; i < str.length; i++ ) {
    var tmp = str.charCodeAt( i );
    retArray[ i ] = tmp;
   }
    return retArray;
   }
	
   function fillArray( name, data_sheet, schematics, vcc, gnd, fb, drain, nc, drv, aaa, sss, doc_rus, ddd, same ) {		
    this.name = name;
    this.name_weight = weight( name );
    this.data_sheet = data_sheet;
    this.data_sheet_weight = weight( data_sheet );
    this.schematics = schematics;
    this.schematics_weight = weight( schematics );
    this.vcc = vcc;
    this.vcc_weight = weight( vcc );
    this.gnd = gnd;
    this.gnd_weight = weight( gnd );
    this.fb = fb;
    this.fb_weight = weight( fb );
    this.drain = drain;
    this.drain_weight = weight( drain );
    this.nc = nc;
    this.nc_weight = weight( nc );
    this.drv = drv;
    this.drv_weight = weight( drv );
    this.aaa = aaa;
    this.aaa_weight = weight( aaa );
    this.sss = sss;
    this.sss_weight = weight( sss );
    this.doc_rus = doc_rus;
    this.doc_rus_weight = weight( doc_rus );
    this.ddd = ddd;
    this.ddd_weight = weight( ddd );
    this.same = same;
    this.same_weight = weight( same );
   }
   
   function isLow( low, high, type ) {
    var len1 = low[ type ].length;
    var len2 = high[ type ].length;
    var length = len1 < len2 ? len1 : len2;
	
    for( var i = 0; i < length; i++ ) {
     var str1 = low[ type ][ i ];
     var str2 = high[ type ][ i ];
     if( str1 < str2 )
      return true;
     if( str1 > str2 )
      return false;
    }
	
    if( len1 < len2 )
     return true;
    return false;
   }
   
   function quickSort( l, h, type ) {
    var low = l;
    var high = h;	
    var rt = eval( "txt[ " + Math.round( ( l + h ) / 2 ) + " ]" );
    var middle = new fillArray( rt.name, rt.data_sheet, rt.schematics, rt.vcc, rt.gnd, rt.fb, rt.drain, rt.nc, rt.drv, rt.aaa, rt.sss, rt.doc_rus, rt.ddd,rt.same );
	
    do {
	
     while( isLow( eval( "txt[ " + low + " ]" ), middle, type ) )
      low++;

     while( isLow( middle, eval( "txt[ " + high + " ]" ), type ) )
      high--;

     if( low <= high ) {
      var temp = txt[ low ];
      txt[ low++ ] = txt[ high ]
      txt[ high-- ] = temp;
     }
    } while( low <= high );

    if( l < high )
     quickSort( l, high, type );
    if( low < h )
     quickSort( low, h, type );
   }

  function createTable( cStart, cType, cSize, cChange ) {
   var tabbd = document.getElementById( "tablebody" );

   if( !tabbd ) {
    var table = document.getElementById( "table" );
    var tbody = document.createElement( "tbody" );
    tbody.id = "tablebody";
    table.appendChild( tbody );
    tabbd = document.getElementById( "tablebody" );
   }
   
   while( tabbd.hasChildNodes() ) {
    var tmp = tabbd.childNodes[ 0 ];
    tabbd.removeChild( tmp );
   }
      
      
   for( var counter = cStart; eval( counter + cType + cSize ); eval( "counter" + cChange ) ) {
    var tr = document.createElement( "tr" );
	tr.id='tr'+counter
	
    td = document.createElement( "td" );
    td.innerHTML = txt[ counter ].name;
    tr.appendChild( td );


    td = document.createElement( "td" );
    td.innerHTML = txt[ counter ].data_sheet;
    tr.appendChild( td );

    var td = document.createElement( "td" );
    td.innerHTML = txt[ counter ].schematics;
    tr.appendChild( td );

    td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].vcc );
	td.setAttribute('id','td'+counter+'_0')
    td.appendChild( tdtxt );
    tr.appendChild( td );

    td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].gnd );
	td.setAttribute('id','td'+counter+'_1')
    td.appendChild( tdtxt );
    tr.appendChild( td );

    td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].fb );
	td.setAttribute('id','td'+counter+'_2')
    td.appendChild( tdtxt );
    tr.appendChild( td );

    var td = document.createElement( "td" );
    var tdtxt = document.createTextNode( txt[ counter ].drain );
	td.setAttribute('id','td'+counter+'_3')
    td.appendChild( tdtxt );
    tr.appendChild( td );

    td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].nc );
	td.setAttribute('id','td'+counter+'_4')
    td.appendChild( tdtxt );
    tr.appendChild( td );

    td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].drv );
	td.setAttribute('id','td'+counter+'_5')
    td.appendChild( tdtxt );
    tr.appendChild( td );

  td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].aaa );
	td.setAttribute('id','td'+counter+'_6')
    td.appendChild( tdtxt );
    tr.appendChild( td );

 td = document.createElement( "td" );
    tdtxt = document.createTextNode( txt[ counter ].sss );
	td.setAttribute('id','td'+counter+'_7')
    td.appendChild( tdtxt );
    tr.appendChild( td );

   td = document.createElement( "td" );
    td.innerHTML = txt[ counter ].doc_rus;
    tr.appendChild( td );

td = document.createElement( "td" );
    td.innerHTML = txt[ counter ].ddd;
    tr.appendChild( td );

    td = document.createElement( "td" );
    
    if ( txt[ counter ].same )
      td.innerHTML = '<a href="javascript://" onclick="showModel(\''+txt[ counter ].same+'\')"><img border="0" src="http://src.ucoz.net/img/icon/vs.png"   ></a>';
    tr.appendChild( td );


    tabbd.appendChild( tr );
   }
  }
  
  function allocator( arg ) {
    if( flag == arg ) {
     if( sorted == "up" ) {
      createTable( 0, "<", txt.length, "++" );
      sorted = "down";
     } else {
      createTable( txt.length - 1, ">=", 0, "--" );
      sorted = "up";
     }
     return;
    }
    quickSort( 0, txt.length - 1, arg );
    createTable( 0, "<", txt.length, "++" );
    flag = arg;
  }