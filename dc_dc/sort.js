//Массивы для флагов показать/скрыть
 var vcc_a = new Array()
 var gnd_a = new Array()
 var fb_a = new Array()
 var drain_a = new Array()
 var nc_a = new Array()
 var drv_a = new Array()
 var aaa_a = new Array()
 var sss_a = new Array()
//Массивы для значений селекта
 var selArr_vcc = new Array()
 var selArr_gnd = new Array()
 var selArr_fb = new Array()
 var selArr_drain = new Array()
 var selArr_nc = new Array()
 var selArr_drv = new Array()
 var selArr_aaa = new Array()
 var selArr_sss = new Array()

function getSelectedValues (oListbox) {
 var arrIndexes = new Array;
 for (var i=0; i < oListbox.options.length; i++) {
   if (oListbox.options[i].selected) arrIndexes.push(oListbox.options[i].value);
  }
 return arrIndexes;
};

function clearSelect(name){
 for (var i=1; i < name.options.length; i++) {
  name.options[i].selected=false
 }
};

function Contain(n, k, a) {
 var c=false
 if(n == 0) var p = txt[ k ].vcc;
 if(n == 1) var p = txt[ k ].gnd;
 if(n == 2) var p = txt[ k ].fb;
 if(n == 3) var p = txt[ k ].drain;
 if(n == 4) var p = txt[ k ].nc;
 if(n == 5) var p = txt[ k ].drv;
 if(n == 6) var p = txt[ k ].aaa;
 if(n == 7) var p = txt[ k ].sss;
 for(var i=0 ; i < a.length ; i++) {
	if(p.indexOf(a[i]) != -1) c=true
 }
 return c
}

function msNull(len,flg,n){
 for(var i = 0 ; i < len ; i++){
  if(flg) {
	vcc_a[i] = 1
	gnd_a[i] = 1
	fb_a[i] = 1
	drain_a[i] = 1
	nc_a[i] = 1
	drv_a[i] = 1
        aaa_a[i] = 1
        sss_a[i] = 1
  } else {
   	 if(n == 0) vcc_a[i] = 1;
	 if(n == 1) gnd_a[i] = 1;
	 if(n == 2) fb_a[i] = 1;
	 if(n == 3) drain_a[i] = 1;
	 if(n == 4) nc_a[i] = 1;
	 if(n == 5) drv_a[i] = 1;
         if(n == 6) aaa_a[i] = 1;
         if(n == 7) sss_a[i] = 1;
  }
 }
}

function getHiddenRow(k) {
 var j=0
 rid = new Array()
 for(var i=0;i<txt.length;i++) {
  switch(k) {
 	case 0:	if(vcc_a[i]==0) {rid[j]=i; j++}; break;
	case 1: if(gnd_a[i]==0) {rid[j]=i; j++}; break;
	case 2: if(fb_a[i]==0) {rid[j]=i; j++}; break;
	case 3: if(drain_a[i]==0) {rid[j]=i; j++}; break;
	case 4: if(nc_a[i]==0) {rid[j]=i; j++}; break;
	case 5: if(drv_a[i]==0) {rid[j]=i; j++}; break;
        case 6: if(aaa_a[i]==0) {rid[j]=i; j++}; break;
        case 7: if(sss_a[i]==0) {rid[j]=i; j++}; break;
  }
 }
 return rid;
}

function ActivateAll() {
 for(var i=0;i<txt.length;i++){
  document.getElementById('tr'+i).style.display=''
 }
}

function sortTable() {
 var x = new Array()
 for(var k = 0 ; k <= 7 ; k++){
  x=getHiddenRow(k)
  for(var i=0;i<x.length;i++){
   document.getElementById('tr'+x[i]).style.display='none'
  }
 }
}

function Rebuild(){
 ActivateAll()
 vcc_s	 = getSelectedValues(document.getElementById('select_1'))
 gnd_s	 = getSelectedValues(document.getElementById('select_2'))
 fb_s	 = getSelectedValues(document.getElementById('select_3'))
 drain_s = getSelectedValues(document.getElementById('select_4'))
 nc_s	 = getSelectedValues(document.getElementById('select_5'))
 drv_s	 = getSelectedValues(document.getElementById('select_6'))
 aaa_s	 = getSelectedValues(document.getElementById('select_7'))
 sss_s	 = getSelectedValues(document.getElementById('select_8'))
 for(var i=0 ; i < txt.length ; i++){
	if (vcc_s != -1)
		if(Contain(0, i, vcc_s)) vcc_a[i]=1; else vcc_a[i]=0
	if (gnd_s != -1)
		if(Contain(1, i, gnd_s)) gnd_a[i]=1; else gnd_a[i]=0
	if (fb_s != -1)
		if(Contain(2, i, fb_s)) fb_a[i]=1; else fb_a[i]=0
	if (drain_s != -1)
		if(Contain(3, i, drain_s)) drain_a[i]=1; else drain_a[i]=0
	if (nc_s != -1)
		if(Contain(4, i, nc_s)) nc_a[i]=1; else nc_a[i]=0
	if (drv_s != -1)
		if(Contain(5, i, drv_s)) drv_a[i]=1; else drv_a[i]=0
        if (aaa_s != -1)
		if(Contain(6, i, aaa_s)) aaa_a[i]=1; else aaa_a[i]=0
        if (sss_s != -1)
		if(Contain(7, i, sss_s)) sss_a[i]=1; else sss_a[i]=0
 }
 if (vcc_s == -1) msNull(txt.length,false,0)
 if (gnd_s == -1) msNull(txt.length,false,1)
 if (fb_s == -1) msNull(txt.length,false,2)
 if (drain_s == -1)	msNull(txt.length,false,3)
 if (nc_s == -1) msNull(txt.length,false,4)
 if (drv_s == -1) msNull(txt.length,false,5)
 if (aaa_s == -1) msNull(txt.length,false,6)
 if (sss_s == -1) msNull(txt.length,false,7)
 sortTable()
};

function debuggInfo(){
var text=''
text+=vcc_a+' - VCC<br>'
text+=gnd_a+' - GND<br>'
text+=fb_a+' - FB<br>'
text+=drain_a+' - DRAIN<br>'
text+=nc_a+' - NC<br>'
text+=drv_a+' - DRV'
text+=aaa_a+' - DRV'
text+=sss_a+' - DRV'
document.getElementById('debugg').innerHTML=text
}