@extends('layouts.plantilla')



<style>
.cd-horizontal-timeline *, *::after, *::before {
  box-sizing: border-box;
}

.mapa_container .cd-horizontal-timeline{
  font-size: 62.5%;
}

.cd-horizontal-timeline {
  font-size: 1.6rem;
  font-family: 'Roboto', sans-serif;
  color: #383838;
  background-color: #f8f8f8;
}

.cd-horizontal-timeline a {
  color: #7b9d6f;
  text-decoration: none;
}

/* -------------------------------- 

Main Components 

-------------------------------- */
.cd-horizontal-timeline {
  opacity: 0;  
  -webkit-transition: opacity 0.2s;
  -moz-transition: opacity 0.2s;
  transition: opacity 0.2s;
}
.cd-horizontal-timeline::before {
  /* never visible - this is used in jQuery to check the current MQ */
  content: 'mobile';
  display: none;
}
.cd-horizontal-timeline.loaded {
  /* show the timeline after events position has been set (using JavaScript) */
  opacity: 1;
}
.cd-horizontal-timeline .timeline {
  position: relative;
  height: 100px;
  width: 90%;
  max-width: 1235px;
  margin: 0 auto;
}
.cd-horizontal-timeline .events-wrapper {
  position: relative;
  height: 100%;
  margin: 0 40px;
  overflow: hidden;
}
.cd-horizontal-timeline .events-wrapper::after, .cd-horizontal-timeline .events-wrapper::before {
  /* these are used to create a shadow effect at the sides of the timeline */
  content: '';
  position: absolute;
  z-index: 2;
  top: 0;
  height: 100%;
  width: 20px;
}
.cd-horizontal-timeline .events-wrapper::before {
  left: 0;
}
.cd-horizontal-timeline .events-wrapper::after {
  right: 0;
}
.cd-horizontal-timeline .events {
  /* this is the grey line/timeline */
  position: absolute;
  z-index: 1;
  left: 0;
  top: 49px;
  height: 2px;
  /* width will be set using JavaScript */
  border-top: 1px dotted white;
  -webkit-transition: -webkit-transform 0.4s;
  -moz-transition: -moz-transform 0.4s;
  transition: transform 0.4s;
}
.cd-horizontal-timeline .filling-line {
  /* this is used to create the green line filling the timeline */
  position: absolute;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  
  -webkit-transform: scaleX(0);
  -moz-transform: scaleX(0);
  -ms-transform: scaleX(0);
  -o-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transform-origin: left center;
  -moz-transform-origin: left center;
  -ms-transform-origin: left center;
  -o-transform-origin: left center;
  transform-origin: left center;
  -webkit-transition: -webkit-transform 0.3s;
  -moz-transition: -moz-transform 0.3s;
  transition: transform 0.3s;
}
.cd-horizontal-timeline .events a {
  position: absolute;
  bottom: 0;
  z-index: 2;
  text-align: center;
  font-size: 25px;
  padding-bottom: 15px;
  color: #fff;
  /* fix bug on Safari - text flickering while timeline translates */
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
}
.cd-horizontal-timeline .events a::after {
  /* this is used to create the event spot */
  content: '';
  position: absolute;
  left: 50%;
  right: auto;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  transform: translateX(-50%);
  bottom: -5px;
  height: 12px;
  width: 12px;
  border-radius: 50%;
  border: 2px solid #dfdfdf;
  background-color: #f8f8f8;
  -webkit-transition: background-color 0.3s, border-color 0.3s;
  -moz-transition: background-color 0.3s, border-color 0.3s;
  transition: background-color 0.3s, border-color 0.3s;
}
.no-touch .cd-horizontal-timeline .events a:hover::after {
  
}
.cd-horizontal-timeline .events a.selected {
  pointer-events: none;
}
.cd-horizontal-timeline .events a.selected::after {
  
}
.cd-horizontal-timeline .events a.older-event::after {
  
}
@media only screen and (min-width: 1100px) {  
  .cd-horizontal-timeline::before {
    /* never visible - this is used in jQuery to check the current MQ */
    content: 'desktop';
  }
}

.cd-timeline-navigation a {
  /* these are the left/right arrows to navigate the timeline */
  position: absolute;
  z-index: 1;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 40px;
  width: 40px;
  border-radius: 50%;
  border: 2px solid #dfdfdf;
  /* replace text with an icon */
  overflow: hidden;
  color: transparent;
  text-indent: 100%;
  white-space: nowrap;
  -webkit-transition: border-color 0.3s;
  -moz-transition: border-color 0.3s;
  transition: border-color 0.3s;
}
.cd-timeline-navigation a::after {
  /* arrow icon */
  content: '>';
  color:white;
  font-size: 25px;
    position: absolute;
    height: 16px;
    width: 16px;
    left: 9%;
    top: 16%;
  bottom: auto;
  right: auto;
  -webkit-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  -o-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}
.cd-timeline-navigation a.prev {
  left: 0;
  -webkit-transform: translateY(-50%) rotate(180deg);
  -moz-transform: translateY(-50%) rotate(180deg);
  -ms-transform: translateY(-50%) rotate(180deg);
  -o-transform: translateY(-50%) rotate(180deg);
  transform: translateY(-50%) rotate(180deg);
}
.cd-timeline-navigation a.next {
  right: 0;
}
.no-touch .cd-timeline-navigation a:hover {
  border-color: #7b9d6f;
}
.cd-timeline-navigation a.inactive {
  cursor: not-allowed;
}
.cd-timeline-navigation a.inactive::after {
  background-position: 0 -16px;
}
.no-touch .cd-timeline-navigation a.inactive:hover {
  border-color: #dfdfdf;
}

.cd-horizontal-timeline .events-content {
  position: relative;
  width: 100%;
  margin: 2em 0;
  overflow: hidden;
  -webkit-transition: height 0.4s;
  -moz-transition: height 0.4s;
  transition: height 0.4s;
}
.cd-horizontal-timeline .events-content li {
  position: absolute;
  z-index: 1;
  width: 100%;
  left: 0;
  top: 0;
  -webkit-transform: translateX(-100%);
  -moz-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  -o-transform: translateX(-100%);
  transform: translateX(-100%);
  padding: 0 5%;
  opacity: 0;
  -webkit-animation-duration: 0.4s;
  -moz-animation-duration: 0.4s;
  animation-duration: 0.4s;
  -webkit-animation-timing-function: ease-in-out;
  -moz-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
}
.cd-horizontal-timeline .events-content li.selected {
  /* visible event content */
  position: relative;
  z-index: 2;
  opacity: 1;
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
}
.cd-horizontal-timeline .events-content li.enter-right, .cd-horizontal-timeline .events-content li.leave-right {
  -webkit-animation-name: cd-enter-right;
  -moz-animation-name: cd-enter-right;
  animation-name: cd-enter-right;
}
.cd-horizontal-timeline .events-content li.enter-left, .cd-horizontal-timeline .events-content li.leave-left {
  -webkit-animation-name: cd-enter-left;
  -moz-animation-name: cd-enter-left;
  animation-name: cd-enter-left;
}
.cd-horizontal-timeline .events-content li.leave-right, .cd-horizontal-timeline .events-content li.leave-left {
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  animation-direction: reverse;
}
.cd-horizontal-timeline .events-content li > * {
  max-width: 800px;
  margin: 0 auto;
}
.cd-horizontal-timeline .events-content h2 {
  font-weight: bold;
  font-size: 2.6rem;  
  font-weight: 700;
  line-height: 1.2;
}
.cd-horizontal-timeline .events-content em {
  display: block;
  font-style: italic;
  margin: 10px auto;
}
.cd-horizontal-timeline .events-content em::before {
  content: '- ';
}
.cd-horizontal-timeline .events-content p {
  font-size: 21px!important;
  color: #fff;
}
.cd-horizontal-timeline .events-content em, .cd-horizontal-timeline .events-content p {
  line-height: 1.6;
}
@media only screen and (min-width: 768px) {
  .cd-horizontal-timeline .events-content h2 {
    font-size: 7rem;
  }
  .cd-horizontal-timeline .events-content em {
    font-size: 2rem;
  }
  .cd-horizontal-timeline .events-content p {
    font-size: 1.8rem;
  }
}

@-webkit-keyframes cd-enter-right {
  0% {
    opacity: 0;
    -webkit-transform: translateX(100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
  }
}
@-moz-keyframes cd-enter-right {
  0% {
    opacity: 0;
    -moz-transform: translateX(100%);
  }
  100% {
    opacity: 1;
    -moz-transform: translateX(0%);
  }
}
@keyframes cd-enter-right {
  0% {
    opacity: 0;
    -webkit-transform: translateX(100%);
    -moz-transform: translateX(100%);
    -ms-transform: translateX(100%);
    -o-transform: translateX(100%);
    transform: translateX(100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
    -moz-transform: translateX(0%);
    -ms-transform: translateX(0%);
    -o-transform: translateX(0%);
    transform: translateX(0%);
  }
}
@-webkit-keyframes cd-enter-left {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
  }
}
@-moz-keyframes cd-enter-left {
  0% {
    opacity: 0;
    -moz-transform: translateX(-100%);
  }
  100% {
    opacity: 1;
    -moz-transform: translateX(0%);
  }
}
@keyframes cd-enter-left {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100%);
    -moz-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    -o-transform: translateX(-100%);
    transform: translateX(-100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
    -moz-transform: translateX(0%);
    -ms-transform: translateX(0%);
    -o-transform: translateX(0%);
    transform: translateX(0%);
  }
}
li::marker {
    font-size: 0px;
}

</style>
@section('content')


<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
            <span class="mb-2" style="color:#505050;">Inicio | Empresa </span>
            
        </div>
    </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        @for ($i = 0; $i < count($sliders); $i++)

        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" style="width: 40px!important;height:5px!important; " class="{{($i == 0) ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>

    @endfor

      </ol>
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
            @if($loop->first)
                <div class="carousel-item active">
                    <div class="row" style=" 
                        background-image:url('{{asset(Storage::url($slider->imagen))}}');
                        background-size:cover;
                    background-repeat:no-repeat;
                    height:396px;
                    background-position:center;
                        ">
                        <div class="col-md-7 ms-auto">
                            <div class="texto" style="">{!!$slider->titulo!!}</div>
                        <div class="textochico">{!!$slider->descripcion!!}</div>
                        </div>
                    </div>
                </div>
            @else 
                <div class="carousel-item">
                    <div class="row" style=" 
                        background-image:url('{{asset(Storage::url($slider->imagen))}}');
                        background-size:cover;
                    background-repeat:no-repeat;
                    height:396px;
                    background-position:center;
                        ">
                        <div class="col-md-10 ms-auto ">
                            <div class="texto" style="">{!!$slider->titulo!!}</div>
                            <div class="textochico">{!!$slider->descripcion!!}</div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach 
    </div>
</div>




<div class="container  my-3">
    
	<div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <img src="{{asset(Storage::url($empresa->imagen))}}" class="img-thumbnail w-100  border-0">
		</div>			
        <div class="col-md-6 my-3">
            <div style="font-size: 14px;color:#505050;">{!!$empresa->descripcion!!}</div>
        </div>
	</div>	
</div>



<div class="mapa_container">
    <section class="cd-horizontal-timeline" style="background:#06337E;padding: 4vh 0;">
    
    <div class="timeline">
      <div class="events-wrapper">
        <div class="events" style="width: 1235px !important;">
          <ol>
                      @forelse ($lineas as $item)
                          @if ($loop->first)
                              <li><a href="#0" data-date="01/01/{{$item->ano}}" class="selected">{{$item->ano}}</a></li>
    
                          @else
                              <li><a href="#0" data-date="01/01/{{$item->ano}}" >{{$item->ano}}</a></li>
                          @endif
                          
                          
                      @empty
                          
                      @endforelse
          </ol>
    
          <span class="filling-line" aria-hidden="true"></span>
        </div> <!-- .events -->
      </div> <!-- .events-wrapper -->
        
      <ul class="cd-timeline-navigation">
        <li><a href="#0" class="prev inactive">Prev</a></li>
        <li><a href="#0" class="next">Next</a></li>
      </ul> <!-- .cd-timeline-navigation -->
    </div> <!-- .timeline -->

    
    <div class="events-content mb-4">
      <ol>
              @forelse ($lineas as $item)
                  @if ($loop->first)
                      <li class="selected" data-date="01/01/{{$item->ano}}">				
                          <p class="text-white">	
                              {!!$item->descripcion!!}
                          </p>
                      </li>
    
                      @else
                      <li  data-date="01/01/{{$item->ano}}">
                          <p class="text-white">	
                              {!!$item->descripcion!!}
                          </p>
                      </li>
                  @endif
              @empty
                  
              @endforelse            
      </ol>
    </div> <!-- .events-content -->





@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  jQuery(document).ready(function($){
var timelines = $('.cd-horizontal-timeline'),
  eventsMinDistance = 60;

(timelines.length > 0) && initTimeline(timelines);

function initTimeline(timelines) {
  timelines.each(function(){
    var timeline = $(this),
      timelineComponents = {};
    //cache timeline components 
    timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
    timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
    timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
    timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
    timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
    timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
    timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
    timelineComponents['eventsContent'] = timeline.children('.events-content');

    //assign a left postion to the single events along the timeline
    setDatePosition(timelineComponents, eventsMinDistance);
    //assign a width to the timeline
    var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
    //the timeline has been initialize - show it
    timeline.addClass('loaded');

    //detect click on the next arrow
    timelineComponents['timelineNavigation'].on('click', '.next', function(event){
      event.preventDefault();
      updateSlide(timelineComponents, timelineTotWidth, 'next');
    });
    //detect click on the prev arrow
    timelineComponents['timelineNavigation'].on('click', '.prev', function(event){
      event.preventDefault();
      updateSlide(timelineComponents, timelineTotWidth, 'prev');
    });
    //detect click on the a single event - show new event content
    timelineComponents['eventsWrapper'].on('click', 'a', function(event){
      event.preventDefault();
      timelineComponents['timelineEvents'].removeClass('selected');
      $(this).addClass('selected');
      updateOlderEvents($(this));
      updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
      updateVisibleContent($(this), timelineComponents['eventsContent']);
    });

    //on swipe, show next/prev event content
    timelineComponents['eventsContent'].on('swipeleft', function(){
      var mq = checkMQ();
      ( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'next');
    });
    timelineComponents['eventsContent'].on('swiperight', function(){
      var mq = checkMQ();
      ( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'prev');
    });

    //keyboard navigation
    $(document).keyup(function(event){
      if(event.which=='37' && elementInViewport(timeline.get(0)) ) {
        showNewContent(timelineComponents, timelineTotWidth, 'prev');
      } else if( event.which=='39' && elementInViewport(timeline.get(0))) {
        showNewContent(timelineComponents, timelineTotWidth, 'next');
      }
    });
  });
}

function updateSlide(timelineComponents, timelineTotWidth, string) {
  //retrieve translateX value of timelineComponents['eventsWrapper']
  var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
    wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
  //translate the timeline to the left('next')/right('prev') 
  (string == 'next') 
    ? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
    : translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
}

function showNewContent(timelineComponents, timelineTotWidth, string) {
  //go from one event to the next/previous one
  var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
    newContent = ( string == 'next' ) ? visibleContent.next() : visibleContent.prev();

  if ( newContent.length > 0 ) { //if there's a next/prev event - show it
    var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
      newEvent = ( string == 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');
    
    updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
    updateVisibleContent(newEvent, timelineComponents['eventsContent']);
    newEvent.addClass('selected');
    selectedDate.removeClass('selected');
    updateOlderEvents(newEvent);
    updateTimelinePosition(string, newEvent, timelineComponents, timelineTotWidth);
  }
}

function updateTimelinePosition(string, event, timelineComponents, timelineTotWidth) {
  //translate timeline to the left/right according to the position of the selected event
  var eventStyle = window.getComputedStyle(event.get(0), null),
    eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
    timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
    timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
  var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

      if( (string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
        translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
      }
}

function translateTimeline(timelineComponents, value, totWidth) {
  var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
  value = (value > 0) ? 0 : value; //only negative translate value
  value = ( !(typeof totWidth === 'undefined') &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
  setTransformValue(eventsWrapper, 'translateX', value+'px');
  //update navigation arrows visibility
  (value == 0 ) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
  (value == totWidth ) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
}

function updateFilling(selectedEvent, filling, totWidth) {
  //change .filling-line length according to the selected event
  var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
    eventLeft = eventStyle.getPropertyValue("left"),
    eventWidth = eventStyle.getPropertyValue("width");
  eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
  var scaleValue = eventLeft/totWidth;
  setTransformValue(filling.get(0), 'scaleX', scaleValue);
}

function setDatePosition(timelineComponents, min) {
  for (i = 0; i < timelineComponents['timelineDates'].length; i++) { 
      var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
        distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 2;
      timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min+'px');
  }
}

function setTimelineWidth(timelineComponents, width) {
  var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
    timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
    timeSpanNorm = Math.round(timeSpanNorm) + 4,
    totalWidth = timeSpanNorm*width;
  timelineComponents['eventsWrapper'].css('width', totalWidth+'px');
  updateFilling(timelineComponents['timelineEvents'].eq(0), timelineComponents['fillingLine'], totalWidth);

  return totalWidth;
}

function updateVisibleContent(event, eventsContent) {
  var eventDate = event.data('date'),
    visibleContent = eventsContent.find('.selected'),
    selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
    selectedContentHeight = selectedContent.height();

  if (selectedContent.index() > visibleContent.index()) {
    var classEnetering = 'selected enter-right',
      classLeaving = 'leave-left';
  } else {
    var classEnetering = 'selected enter-left',
      classLeaving = 'leave-right';
  }

  selectedContent.attr('class', classEnetering);
  visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
    visibleContent.removeClass('leave-right leave-left');
    selectedContent.removeClass('enter-left enter-right');
  });
  eventsContent.css('height', selectedContentHeight+'px');
}

function updateOlderEvents(event) {
  event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
}

function getTranslateValue(timeline) {
  var timelineStyle = window.getComputedStyle(timeline.get(0), null),
    timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
           timelineStyle.getPropertyValue("-moz-transform") ||
           timelineStyle.getPropertyValue("-ms-transform") ||
           timelineStyle.getPropertyValue("-o-transform") ||
           timelineStyle.getPropertyValue("transform");

      if( timelineTranslate.indexOf('(') >=0 ) {
        var timelineTranslate = timelineTranslate.split('(')[1];
      timelineTranslate = timelineTranslate.split(')')[0];
      timelineTranslate = timelineTranslate.split(',');
      var translateValue = timelineTranslate[4];
      } else {
        var translateValue = 0;
      }

      return Number(translateValue);
}

function setTransformValue(element, property, value) {
  element.style["-webkit-transform"] = property+"("+value+")";
  element.style["-moz-transform"] = property+"("+value+")";
  element.style["-ms-transform"] = property+"("+value+")";
  element.style["-o-transform"] = property+"("+value+")";
  element.style["transform"] = property+"("+value+")";
}

//based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
function parseDate(events) {
  var dateArrays = [];
  events.each(function(){
    var dateComp = $(this).data('date').split('/'),
      newDate = new Date(dateComp[2], dateComp[1]-1, dateComp[0]);
    dateArrays.push(newDate);
  });
    return dateArrays;
}

function parseDate2(events) {
  var dateArrays = [];
  events.each(function(){
    var singleDate = $(this),
      dateComp = singleDate.data('date').split('T');
    if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
      var dayComp = dateComp[0].split('/'),
        timeComp = dateComp[1].split(':');
    } else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
      var dayComp = ["2000", "0", "0"],
        timeComp = dateComp[0].split(':');
    } else { //only DD/MM/YEAR
      var dayComp = dateComp[0].split('/'),
        timeComp = ["0", "0"];
    }
    var	newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
    dateArrays.push(newDate);
  });
    return dateArrays;
}

function daydiff(first, second) {
    return Math.round((second-first));
}

function minLapse(dates) {
  //determine the minimum distance among events
  var dateDistances = [];
  for (i = 1; i < dates.length; i++) { 
      var distance = daydiff(dates[i-1], dates[i]);
      dateDistances.push(distance);
  }
  return Math.min.apply(null, dateDistances);
}

/*
  How to tell if a DOM element is visible in the current viewport?
  http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
*/
function elementInViewport(el) {
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while(el.offsetParent) {
      el = el.offsetParent;
      top += el.offsetTop;
      left += el.offsetLeft;
  }

  return (
      top < (window.pageYOffset + window.innerHeight) &&
      left < (window.pageXOffset + window.innerWidth) &&
      (top + height) > window.pageYOffset &&
      (left + width) > window.pageXOffset
  );
}

function checkMQ() {
  //check if mobile or desktop device
  return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
}
});
</script>