var calendarInstance = new calendarJs( "myCalendar", {
    exportEventsEnabled: true,
    manualEditingEnabled: true,
    showTimesInMainCalendarEvents: false,
    minimumDayHeight: 0,
    manualEditingEnabled: true,
    organizerName: "Your Name",
    organizerEmailAddress: "your@email.address"
} );

calendarInstance.addEvents( getEvents() );

function turnOnEventNotifications() {
    calendarInstance.setOptions( {
        eventNotificationsEnabled: true
    } );
}

function setEvents() {
    calendarInstance.setEvents( getEvents() );
}

function removeEvent() {
    calendarInstance.removeEvent( new Date(), "Test Title 2" );
}

function daysInMonth( year, month ) {
    return new Date( year, month + 1, 0 ).getDate();
}

function setOptions() {
    calendarInstance.setOptions( {
        minimumDayHeight: 70,
        manualEditingEnabled: false,
        exportEventsEnabled: false,
        showDayNumberOrdinals: false,
        fullScreenModeEnabled: false,
        maximumEventsPerDayDisplay: 0,
        showTimelineArrowOnFullDayView: false,
        maximumEventTitleLength: 10,
        maximumEventDescriptionLength: 10,
        maximumEventLocationLength: 10,
        maximumEventGroupLength: 10,
        showDayNamesInMainDisplay: false,
        tooltipsEnabled: false
    } );
}

function setCurrentDisplayDate() {
    var newDate = new Date();
    newDate.setMonth( newDate.getMonth() + 3 );

    calendarInstance.setCurrentDisplayDate( newDate );
}

function getEvents() {
    var previousDay = new Date(),
        today9 = new Date(),
        today11 = new Date(),
        tomorrow = new Date(),
        firstDayInNextMonth = new Date(),
        lastDayInNextMonth = new Date(),
        today = new Date(),
        today3HoursAhead = new Date();

    previousDay.setDate( previousDay.getDate() - 1 );
    today11.setHours( 11 );
    tomorrow.setDate( today11.getDate() + 1 );
    today9.setHours( 9 );

    firstDayInNextMonth.setDate( 1 );
    firstDayInNextMonth.setDate( firstDayInNextMonth.getDate() + daysInMonth( firstDayInNextMonth.getFullYear(), firstDayInNextMonth.getMonth() ) );

    lastDayInNextMonth.setDate( 1 );
    lastDayInNextMonth.setMonth( lastDayInNextMonth.getMonth() + 1 );
    lastDayInNextMonth.setDate( lastDayInNextMonth.getDate() + daysInMonth( lastDayInNextMonth.getFullYear(), lastDayInNextMonth.getMonth() ) - 1 );

    today.setHours( 21, 59, 0, 0 );
    today.setDate( today.getDate() + 3 );
    today3HoursAhead.setHours( 23, 59, 0, 0 );
    today3HoursAhead.setDate( today3HoursAhead.getDate() + 3 );

     return [
        {
            from: previousDay,
            to: previousDay,
            title: "Previous Day",
            description: "Consulta com o Dr 1",
            location: "Consultório 1",
            isAllDay: false,
            color: "#8000ff",
            colorText: "#fff",
            colorBorder: "#0000ff",
            // repeatEvery: 4,
            id: "1234-5678-9",
            group: "Dr 1"
        }
    //     {
    //         from: today11,
    //         to: tomorrow,
    //         title: "Title 1",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         location: "Teams Meeting",
    //         isAllDay: false,
    //         group: "Dr 1"
    //     },
    //     {
    //         from: tomorrow,
    //         to: today11,
    //         title: "Title Bad (should not show)",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         location: "Teams Meeting",
    //         isAllDay: false,
    //         group: "Dr 1"
    //     },
    //     {
    //         from: today9,
    //         to: today9,
    //         title: "Title 2",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         location: "Teams Meeting",
    //         isAllDay: true,
    //         group: "Dr 2"
    //     },
    //     {
    //         from: firstDayInNextMonth,
    //         to: firstDayInNextMonth,
    //         title: "First Day 1",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         location: "Teams Meeting",
    //         isAllDay: true,
    //         color: "#00FF00",
    //         colorText: "#FF0000",
    //         repeatEvery: 3,
    //         group: "Dr 2"
    //     },
    //     {
    //         from: firstDayInNextMonth,
    //         to: firstDayInNextMonth,
    //         title: "First Day 2",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         location: "Teams Meeting",
    //         isAllDay: true,
    //         color: "#00FF00",
    //         colorText: "#FF0000",
    //         repeatEvery: 3,
    //         group: "Dr 2"
    //     },
    //     {
    //         from: lastDayInNextMonth,
    //         to: lastDayInNextMonth,
    //         title: "Last Day 1",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         location: "Teams Meeting",
    //         isAllDay: true,
    //         color: "#0000FF",
    //         repeatEvery: 2,
    //         group: "Dr 2"
    //     },
    //     {
    //         from: today,
    //         to: today3HoursAhead,
    //         title: "Regular Event",
    //         description: "This is a another description of the event that has been added, so it can be shown in the pop-up dialog.",
    //         repeatEvery: 1,
    //         repeatEveryExcludeDays: [ 6, 0 ],
    //         repeatEnds: new Date( today.getFullYear() + 1, 0, 1 ),
    //         group: "Dr 2"
    //     }
    ];
}