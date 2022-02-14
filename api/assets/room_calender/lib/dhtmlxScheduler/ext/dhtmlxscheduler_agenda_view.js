/*
@license
dhtmlxScheduler v.4.4.9 Professional Evaluation

This software is covered by DHTMLX Evaluation License. Contact sales@dhtmlx.com to get Commercial or Enterprise license. Usage without proper license is prohibited.

(c) Dinamenta, UAB.
*/
Scheduler.plugin(function(e){e.date.add_agenda=function(t){return e.date.add(t,1,"year")},e.templates.agenda_time=function(t,i,a){return a._timed?this.day_date(a.start_date,a.end_date,a)+" "+this.event_date(t):e.templates.day_date(t)+" &ndash; "+e.templates.day_date(i)},e.templates.agenda_text=function(e,t,i){return i.text},e.templates.agenda_date=function(){return""},e.date.agenda_start=function(){return e.date.date_part(e._currentDate())},e.attachEvent("onTemplatesReady",function(){function t(t){
if(t){var i=e.locale.labels,a=e._waiAria.agendaHeadAttrString(),r=e._waiAria.agendaHeadDateString(i.date),s=e._waiAria.agendaHeadDescriptionString(i.description);e._els.dhx_cal_header[0].innerHTML="<div "+a+" class='dhx_agenda_line'><div "+r+">"+i.date+"</div><span style='padding-left:25px' "+s+">"+i.description+"</span></div>",e._table_view=!0,e.set_sizes()}}function i(){var t=(e._date,e.get_visible_events());t.sort(function(e,t){return e.start_date>t.start_date?1:-1});for(var i,a=e._waiAria.agendaDataAttrString(),r="<div class='dhx_agenda_area' "+a+">",s=0;s<t.length;s++){
var n=t[s],d=n.color?"background:"+n.color+";":"",l=n.textColor?"color:"+n.textColor+";":"",o=e.templates.event_class(n.start_date,n.end_date,n);i=e._waiAria.agendaEventAttrString(n);var h=e._waiAria.agendaDetailsBtnString();r+="<div "+i+" class='dhx_agenda_line"+(o?" "+o:"")+"' event_id='"+n.id+"' style='"+l+d+(n._text_style||"")+"'><div class='dhx_agenda_event_time'>"+e.templates.agenda_time(n.start_date,n.end_date,n)+"</div>",r+="<div "+h+" class='dhx_event_icon icon_details'>&nbsp</div>",r+="<span>"+e.templates.agenda_text(n.start_date,n.end_date,n)+"</span></div>";
}r+="<div class='dhx_v_border'></div></div>",e._els.dhx_cal_data[0].innerHTML=r,e._els.dhx_cal_data[0].childNodes[0].scrollTop=e._agendaScrollTop||0;var _=e._els.dhx_cal_data[0].childNodes[0],c=_.childNodes[_.childNodes.length-1];c.style.height=_.offsetHeight<e._els.dhx_cal_data[0].offsetHeight?"100%":_.offsetHeight+"px";var u=e._els.dhx_cal_data[0].firstChild.childNodes;e._els.dhx_cal_date[0].innerHTML=e.templates.agenda_date(e._min_date,e._max_date,e._mode),e._rendered=[];for(var s=0;s<u.length-1;s++)e._rendered[s]=u[s];
}var a=e.dblclick_dhx_cal_data;e.dblclick_dhx_cal_data=function(){if("agenda"==this._mode)!this.config.readonly&&this.config.dblclick_create&&this.addEventNow();else if(a)return a.apply(this,arguments)},e.attachEvent("onSchedulerResize",function(){return"agenda"==this._mode?(this.agenda_view(!0),!1):!0});var r=e.render_data;e.render_data=function(e){return"agenda"!=this._mode?r.apply(this,arguments):void i()};var s=e.render_view_data;e.render_view_data=function(){return"agenda"==this._mode&&(e._agendaScrollTop=e._els.dhx_cal_data[0].childNodes[0].scrollTop,
e._els.dhx_cal_data[0].childNodes[0].scrollTop=0),s.apply(this,arguments)},e.agenda_view=function(a){e._min_date=e.config.agenda_start||e.date.agenda_start(e._date),e._max_date=e.config.agenda_end||e.date.add_agenda(e._min_date,1),t(a),a?(e._cols=null,e._colsS=null,e._table_view=!0,i()):e._table_view=!1}})});