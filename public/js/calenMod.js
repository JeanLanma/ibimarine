"use strict";

const LOCALE_LANG = document.documentElement.lang || 'en';

const LocaleForMonths = new Intl.DateTimeFormat(LOCALE_LANG, { month: 'long' })
const LocaleForWeeks  = new Intl.DateTimeFormat(LOCALE_LANG, { weekday: 'narrow' })

const ThePresent = new (function(){
    this.DATE = new Date();
    this.YEAR = this.DATE.getFullYear();
    this.MONTH = this.DATE.getMonth();
    this.DAY = this.DATE.getDate();
})();

const UEmiter = function(){

    events = [];

    this.on = function(eventName, Listener){
        this.events[eventName] = this.events[eventName] || [];
        this.events[eventName].push(Listener);
    }

    this.emit = function(eventName){
        this.events[eventName].forEach( (listener) => listener());
    }
}

const UCalendar = new (function(){
    this.DaysOfTheWeekSlots = [0,1,2,3,4,5,6];
    this.MonthSlots         = [0,1,2,3,4,5,6,7,8,9,10,11];

    this.Now = function(){
        const DATE = new Date();
        const Year = DATE.getFullYear();
        const Month = DATE.getMonth();
        const Day = DATE.getDate();
        return {
          DATE,
          Year,
          Month,
          Day,
          localeMonth:  LocaleForMonths.format(new Date(Year, Month)),
        };
    };

    this.weekDays = this.DaysOfTheWeekSlots.map((dayIndex) => // This Speceific day starts on Monday
                        LocaleForWeeks.format(new Date(2022, 7, dayIndex + 1))
                    );

    this.getMonthCalendarInfo = function(Year = this.Now().Year, Month = this.Now().Month){
        const currentDate = new Date(Year, Month, 1);
        return {
            startsOn: (currentDate.getDay() === 0) ? 7 : currentDate.getDay(),
            monthName: LocaleForMonths.format(currentDate),
            numberDaysInMonth: new Date(Year, Month + 1, 0).getDate(),
            monthId: Year + '-' + this.toValidDateNumber(Month + 1),
            year: Year,
          }
    }

    this.getYearCalendarInfo = function(Year = this.Now().Year){
        return this.MonthSlots.map((monthIndex) => this.getMonthCalendarInfo(Year, monthIndex));
    }

    this.toValidDateNumber = (number) =>{
        return ('' + number).length < 2 ? '0' + ('' + number): ('' + number);
    }

    this.parserFromNumbers = function(YYYY,M,D){
      const ParsedDate = new Date(YYYY,M,D);
      const dateId = [YYYY,UCalendar.toValidDateNumber(M+1),UCalendar.toValidDateNumber(D)].join('-');
      const calendarDate = document.querySelector(`[data-day-id="${dateId}"]`) || document.createElement('span');
      return {
        date: ParsedDate,
        dateId,
        dateElement: calendarDate,
        year: ParsedDate.getFullYear(),
        month: ParsedDate.getMonth(),
        monthName: LocaleForMonths.format(ParsedDate),
        day: ParsedDate.getDate(),
        addDays: function(days){
                    const newDate = new Date( +ParsedDate );
                    newDate.setDate(newDate.getDate() + Number(days));
                    const newDateParsed = UCalendar.parserFromNumbers(newDate.getFullYear(),newDate.getMonth(),newDate.getDate());
                    console.log(newDateParsed)
                    return newDate;
                }
            
      }
    }

    this.parser = function(calendarDate){
      const [year, month, day] = calendarDate.getAttribute('data-day-id').split('-');
      const ParsedDate = new Date(Number(year),Number(month - 1),Number(day));

      return {
        date: ParsedDate,
        dateId: [year,month,day].join(''),
        dateElement: calendarDate,
        year: ParsedDate.getFullYear(),
        month: ParsedDate.getMonth(),
        monthName: LocaleForMonths.format(ParsedDate),
        day: ParsedDate.getDate(),
        addDays: function(days){
                    const newDate = new Date( +ParsedDate );
                    newDate.setDate(newDate.getDate() + Number(days));
                    const newDateParsed = UCalendar.parserFromNumbers(newDate.getFullYear(),newDate.getMonth(),newDate.getDate());
                    return newDate;
                }
            
      }
    }

    this.isDuplicated = function(Elements, elemntId){
      return parsedDatesId.indexOf(dateId);
    }
    this.isDuplicatedDate = function(ParsedDates, date){
      const DatesId = ParsedDates.map( (parsedDate) => parsedDate.dateId);

      return DatesId.indexOf(date.dateId);
    }

    this.isCalendarDate = function(element){
        return element.classList.contains('month-day');
    }

    this.isAfterToday = function(calendarDate){
      return calendarDate > UCalendar.Now().DATE;
    }

    this.areConsecutiveDates = function(lastDay, pickedDay){
      return lastDay;
    }
})();

const UDatePicker = function(UcalendarParsed){
    this.savedDates = [];

    this.saveDate = function(ParsedDate){
        this.savedDates.push(ParsedDate);
    };
    this.pickDate = function(ParsedDate){
      if(ParsedDate.hasOwnProperty('dateElement')) {
          let classToggle = ParsedDate.dateElement.classList.toggle('calendar__day-selected');
          const isRepeteated = UCalendar.isDuplicatedDate(this.savedDates,ParsedDate);
          if(isRepeteated === -1){
            this.savedDates.push(ParsedDate);
          }else {
            this.savedDates.splice(isRepeteated, 1);
          }
        }
        
    };

    this.getDates = function(){
        return this.savedDates;
    }
}

const UXCalendar = function({UIcalendar}){

    this.UIcalendar = UIcalendar;
    
    this.showNextCalendar = function(e){
      const activeCalendar = document.querySelector('.calendar-active');

      if(activeCalendar.nextElementSibling) {
          activeCalendar.classList.remove('calendar-active');
          activeCalendar.nextElementSibling.classList.add('calendar-active');
      }
    }
    this.showPrevCalendar = function(e){
      const activeCalendar = document.querySelector('.calendar-active');

      if(activeCalendar.previousElementSibling) {
          activeCalendar.classList.remove('calendar-active');
          activeCalendar.previousElementSibling.classList.add('calendar-active');
      }
    }
}

const UICalendar = function({startsOn, monthName, numberDaysInMonth, monthId, year}){

    this.firstDayAttributes = `class='first-day month-day' style='--first-day-start: ${startsOn}'`;
    
    this.HtmlMonthDays = [...Array(numberDaysInMonth).keys()].map((dayIndex) =>
    `<li ${dayIndex === 0 ? this.firstDayAttributes : 'class="month-day"'} data-day-id="${monthId}-${UCalendar.toValidDateNumber(dayIndex + 1)}">${dayIndex + 1}</li>\n`
    );

    this.HtmlWeekDays = UCalendar.weekDays.map((dayName) => `<li class='day-name'>${dayName}</li> \n`);

    this.HtmlMonthCalendar =`
                              <div data-month-id="${monthId}" class="max-w-xs w-4/5 mx-auto hidden ${UCalendar.getMonthCalendarInfo().monthName === monthName ? 'calendar-active': ''}">
                              <div class="bg-old-gold flex justify-center text-white h-11 items-center rounded-t-xl text-xl">
                                <div class="calendar-left-arrow cursor-pointer"><svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path></svg><!-- <i class="fa-solid fa-chevron-left"></i> Font Awesome fontawesome.com --></div>
                                  <div class="calendar__month_year mx-10">
                                    <span class="calendar__month text-capitalize">${monthName}</span>
                                    <span class="calendar__year">${year}</span>
                                  </div>
                                <div class="calendar-right-arrow cursor-pointer"><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg><!-- <i class="fa-solid fa-chevron-right"></i> Font Awesome fontawesome.com --></div>
                              </div>
                              <div class="calendar__days-container border-x-2 border-b-2 border-old-black/60 rounded-b-xl text-old-black">
                                  <ol class="calendar__days text-center grid grid-cols-7 pb-3 px-0 text-xl text-old-black">
                                      ${this.HtmlWeekDays.join('')}
                                  </ol>
                                  <ol class="calendar__days calendar__numberDay text-center grid grid-cols-7 pb-3 px-0 text-xl">
                                    ${this.HtmlMonthDays.join('')}
                                  </ol>
                              </div>
                          </div>
                          `;
    this.HtmlMonthCalendar_1 = `
          <div data-month-id="${monthId}" class="max-w-xs calendar-front ${UCalendar.getMonthCalendarInfo().monthName === monthName ? 'calendar-active': ''}">
          <div class="calendar__header">
            <div class="calendar-left-arrow cursor-pointer"><i class="fa-solid fa-chevron-left"></i></div>
              <div class="calendar__month_year">
                <span class="calendar__month text-capitalize">${monthName}</span>
                <span class="calendar__year">${year}</span>
              </div>
            <div class="calendar-right-arrow cursor-pointer"><i class="fa-solid fa-chevron-right"></i></div>
          </div>
          <div class="calendar__days-container text-color-black-muted">
            <ol class="calendar__days text-bold">
                ${this.HtmlWeekDays.join('')}
            </ol>
            <ol class="calendar__days calendar__numberDay text-color-black-muted text-bold">
                ${this.HtmlMonthDays.join('')}
            </ol>
          </div>

      </div>
    `;

}

const UIFullCalendar = function({Year, target}){

    const _Year = Year || UCalendar.Now().Year;
    this._target = target;  

    this.UIcalendar = UCalendar.getYearCalendarInfo(_Year).map((element) => new UICalendar(element));
    this.UICalendarHtml = this.UIcalendar.map((HtmlCalendar) => HtmlCalendar.HtmlMonthCalendar);
    
    this._target.innerHTML = this.UICalendarHtml.join('');


    const pickedDays = new UDatePicker(UCalendar);
    const UXcontroll = new UXCalendar({UIcalendar: this})

    document.addEventListener('DOMContentLoaded', function(event){

        if(typeof target !== 'object') return null;

        target.addEventListener('click', function(e){

          if(e.target.classList.contains('fa-chevron-right') || e.target.classList.contains('calendar-right-arrow')) {
              UXcontroll.showNextCalendar(e);
          }
      if(e.target.classList.contains('fa-chevron-left') || e.target.classList.contains('calendar-left-arrow')) {
              UXcontroll.showPrevCalendar(e);
          }

            if(!UCalendar.isCalendarDate(e.target)) return null;

            const pickedDay = UCalendar.parser(e.target);

            if(!UCalendar.isAfterToday(pickedDay.date)) ;//return null;

            pickedDays.pickDate(pickedDay);
        })
    })
    
}