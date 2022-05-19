(function($, Drupal){
    Drupal.behaviors.fullCalendar = {
        attach: function(context, settings) {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                dayClick: function(date, jsEvent, view){
                    if(view.type == 'agendaDay')
                        return FALSE;
                    
                    $('#calendar').fullCalendar( 'changeView', 'agendaDay' );
                    $('#calendar').fullCalendar( 'gotoDate', date );
                },
                eventClick: function(calEvent, jsEvent, view) {

                    $('<div></div>').dialog({
                        modal: true,
                        title: "Tour Info",
                        open: function() {
                            var markup = calEvent.markup;
                            $(this).html(markup);
                        },
                        buttons: {
                            close: {
                                text: "Close",
                                click: function() {
                                    $( this ).dialog( "close" );
                                }
                            },
                            delete: {
                                text: "Delete",
                                click: function(){
                                    var modal = $(this);
                                    $.post(
                                        '/admin/content/tour/delete/'+calEvent.id,
                                        {
                                            key: Drupal.settings.lost_coast.key
                                        },
                                        function(data){
                                            $('#calendar').fullCalendar('removeEvents', calEvent.id);
                                            modal.dialog( "close" );
                                        }
                                    );
                                }
                            }
                        }
                    });
                },
                select: function(start, end, jsEvent, view) {
                    if(view.type == 'month')
                        return false;

                    $.post(
                        '/admin/content/tour/add',
                        {
                            start: start.format("YYYY-MM-DD HH:mm:00"),
                            end: end.format("YYYY-MM-DD HH:mm:00"),
                            key: Drupal.settings.lost_coast.key
                        },
                        function(data){
                            var JSONData = JSON.parse(data);
                            $('#calendar').fullCalendar('renderEvent', JSONData, true);
                            $('#calendar').fullCalendar('unselect');
                        }
                    );
                },
                eventDrop: function(event, delta, revertFunc, jsEvent, ui, view){
                    $.post(
                        '/admin/content/tour/edit/'+event.id,
                        {
                            start: event.start.format("YYYY-MM-DD HH:mm:00"),
                            end: event.end.format("YYYY-MM-DD HH:mm:00"),
                            key: Drupal.settings.lost_coast.key
                        },
                        function(data){
                            var JSONData = JSON.parse(data);
                            event.markup = JSONData.markup;
                            $('#calendar').fullCalendar('updateEvent', event);
                        }
                    );
                },
                eventResize: function(event, jsEvent, ui, view){
                    $.post(
                        '/admin/content/tour/edit/'+event.id,
                        {
                            start: event.start.format("YYYY-MM-DD HH:mm:00"),
                            end: event.end.format("YYYY-MM-DD HH:mm:00"),
                            key: Drupal.settings.lost_coast.key
                        },
                        function(data){
                            var JSONData = JSON.parse(data);
                            event.markup = JSONData.markup;
                            $('#calendar').fullCalendar('updateEvent', event);
                        }
                    );
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: Drupal.settings.lost_coast.tours
            });
        }
    };
}(jQuery, Drupal));