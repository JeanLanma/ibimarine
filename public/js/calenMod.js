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

    this.events = {};

    this.on = function(eventName, Listener){
        this.events[eventName] = this.events[eventName] || [];
        this.events[eventName].push(Listener);
    }

    this.emit = function(eventName){

      if(this.events[eventName]){
          this.events[eventName].forEach( (listener) => listener());
      }
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

    this.getDayString = function(){
        return `${this.Now().Year}-${this.toValidDateNumber(this.Now().Month + 1)}-${this.toValidDateNumber(this.Now().Day)}`;
    }

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
            month: Month,
          }
    }

    this.getYearCalendarInfo = function(Year = this.Now().Year){
        return this.MonthSlots.map((monthIndex) => this.getMonthCalendarInfo(Year, monthIndex));
    }

    this.toValidDateNumber = (number) =>{
        return ('' + number).length < 2 ? '0' + ('' + number): ('' + number);
    }

    this.stringToDateParts = function(DateString = '0000-00-00'){
      const [year, month, day] = DateString.split('-');
      return {
        day,
        month,
        year,
      }
    }
    this.stringToDateYM = function(DateString = '0000-00'){
      const [year, month] = DateString.split('-');
      return {
        month: Number(month) - 1,
        year: Number(year),
      }
    }

    this.getPeriodDates = function(dateStart, dateEnd){
      const {day, month, year} = this.stringToDateParts(dateStart);
      const dateStr = this.stringToDateParts(dateEnd);
        for(var dates=[],dt=new Date(Number(year), Number(month) - 1, Number(day)); dt<=new Date(Number(dateStr.year), Number(dateStr.month) - 1, Number(dateStr.day)); dt.setDate(dt.getDate()+1)){
            dates.push(new Date(dt));
        }
    return dates;
    }

    this.parsePeriod = function(dateStart, dateEnd){
        const datesInPeriod = this.getPeriodDates(dateStart, dateEnd);

        return datesInPeriod.map((date) => {
          return this.parserFromNumbers(date.getFullYear(), date.getMonth(), date.getDate());
        });
    }

    this.parserFromNumbers = function(YYYY,M,D){
      const ParsedDate = new Date(YYYY,M,D);
      const dateId = [YYYY,UCalendar.toValidDateNumber(M+1),UCalendar.toValidDateNumber(D)].join('-');
      const calendarElement = document.querySelector(`[data-day-id="${dateId}"]`);
      return {
        date: ParsedDate,
        dateId,
        dateElement: calendarElement,
        year: ParsedDate.getFullYear(),
        month: ParsedDate.getMonth(),
        monthName: LocaleForMonths.format(ParsedDate),
        day: ParsedDate.getDate(),
        addDays: function(days){
                    const newDate = new Date( ParsedDate );
                    newDate.setDate(newDate.getDate() + Number(days));
                    return UCalendar.parserFromNumbers(newDate.getFullYear(),newDate.getMonth(),newDate.getDate());
                }
            
      }
    }

    /**
     * 
     * @param string StringDate - 2020-12-31 example date string
     * @returns UCalendar.Date
     */

    this.parse = function(StringDate = 'yyyy-mm-dd'){
      const [year, month, day] = StringDate.split('-');

      if(!year || !month || !day) return console.error('Invalid String Format Date Recived: "'+ StringDate + '" Expected format example: "1969-01-30"');

      const ParsedDate = new Date(Number(year),Number(month - 1),Number(day));
      const calendarElement = document.querySelector(`[data-day-id="${StringDate}"]`);

      return {
        date: ParsedDate,
        dateValue: StringDate,
        dateId: [year,month,day].join(''),
        dateElement: calendarElement,
        year: ParsedDate.getFullYear(),
        month: ParsedDate.getMonth(),
        monthName: LocaleForMonths.format(ParsedDate),
        day: ParsedDate.getDate(),
        addDays: function(days){
                    const newDate = new Date( ParsedDate );
                    newDate.setDate(newDate.getDate() + Number(days));
                    return UCalendar.parserFromNumbers(newDate.getFullYear(),newDate.getMonth(),newDate.getDate());
                }
            
      }
    }

    this.parser = function(calendarDate){
      if(!calendarDate.hasAttribute('data-day-id')) return ;
      const [year, month, day] = calendarDate.getAttribute('data-day-id').split('-');
      const ParsedDate = new Date(Number(year),Number(month - 1),Number(day));

      return {
        date: ParsedDate,
        dateValue: calendarDate.getAttribute('data-day-id'),
        dateId: [year,month,day].join(''),
        dateElement: calendarDate,
        year: ParsedDate.getFullYear(),
        month: ParsedDate.getMonth(),
        monthName: LocaleForMonths.format(ParsedDate),
        day: ParsedDate.getDate(),
        addDays: function(days){
                    const newDate = new Date( ParsedDate );
                    newDate.setDate(newDate.getDate() + Number(days));
                    return UCalendar.parserFromNumbers(newDate.getFullYear(),newDate.getMonth(),newDate.getDate());
                }
            
      }
    }

    this.isDuplicatedDate = function(ParsedDates, date){
      const DatesId = ParsedDates.map( (parsedDate) => parsedDate.dateId);

      return DatesId.indexOf(date.dateId);
    }

    this.isCalendarDate = function(element){
        return element.classList.contains('month-day') && element.hasAttribute('data-day-id');
    }

    this.isAfterToday = function(calendarDate){
      return calendarDate > UCalendar.Now().DATE;
    }

    this.areConsecutiveDates = function(days,newDay){
      if(days.length <= 1) return true;
      const day = days[days.length - 2];
      const nextDay = days[days.length - 1];
      return (day.addDays(1).date.getTime() === nextDay.date.getTime());
    }

    this.isCallable = function(func){
      return typeof func === 'function';
    }
})();

const UDatePicker = function(UICalendarInstance,onDayPicked, onEmptyDates){
    this.events = new UEmiter();
    this.savedDates = [];

    this.saveDate = function(ParsedDate){
        this.savedDates.push(ParsedDate);
    };
    this.emptyDates = function(){
      while(this.savedDates.length){
        this.clearDateFromCalendar(this.savedDates[this.savedDates.length - 1]);
        this.savedDates.pop();
      }
    }
    this.clearDateFromCalendar = function(date){
      if(date.hasOwnProperty('dateElement')) {
          let classTogle = date.dateElement.classList.remove('calendar__day-selected');
      }
    }
    this.pickDate = function(ParsedDate){

      if(ParsedDate.hasOwnProperty('dateElement')) {
        const isRepeteated = UCalendar.isDuplicatedDate(this.savedDates,ParsedDate);

        let classToggle = ParsedDate.dateElement.classList.toggle('calendar__day-selected');

        if(isRepeteated === -1){
            this.savedDates.push(ParsedDate);
            if(!UCalendar.areConsecutiveDates(this.savedDates)){
              this.emptyDates();
              let classToggle = ParsedDate.dateElement.classList.add('calendar__day-selected');
              this.savedDates.push(ParsedDate);
            }

            if(this.isCallable(onDayPicked)){
              onDayPicked(UICalendarInstance);
            }

          }else {
              if(this.savedDates.length === 1){
                this.savedDates.splice(isRepeteated, 1);
                if(this.isCallable(onEmptyDates)){
                  onEmptyDates(UICalendarInstance);
                }
                return;
              }
              this.emptyDates();
              let classToggle = ParsedDate.dateElement.classList.add('calendar__day-selected');
              this.savedDates.push(ParsedDate);
              if(this.isCallable(onDayPicked)){
                onDayPicked(UICalendarInstance);
              }
              // this.savedDates.splice(isRepeteated, 1);
          }
          if(this.savedDates.length < 1 && this.isCallable(onEmptyDates)){
              onEmptyDates(UICalendarInstance)
          }
        }
        
    };

    this.getDates = function(){
        return this.savedDates;
    }

    this.isCallable = function(func){
      return typeof func === 'function';
    }
}

const UXCalendar = function(UIcalendar, onChangeMonth){
    let counter = 0;
    let yearCounter = UCalendar.Now().Year + 1;
    
    this.showNextCalendar = function(e){
      const activeCalendar = document.querySelector('.calendar-active');

      if(activeCalendar.nextElementSibling) {
          activeCalendar.classList.remove('calendar-active');
          activeCalendar.nextElementSibling.classList.add('calendar-active');

            if(this.isCallable(onChangeMonth)){
                onChangeMonth(document.querySelector('.calendar-active'));
            }
        }
        if(!activeCalendar.nextElementSibling.nextElementSibling) {
          const year = counter < 11 ? yearCounter : yearCounter++;
          const month = counter > 11 ? 0 : counter++;
          UIcalendar.generateNewMonth(year, month);
          
          if(this.isCallable(onChangeMonth)){
              onChangeMonth(document.querySelector('.calendar-active'));
          }
      }
      
    }
    this.showPrevCalendar = function(e){
      const activeCalendar = document.querySelector('.calendar-active');

      if(activeCalendar.previousElementSibling) {
          activeCalendar.classList.remove('calendar-active');
          activeCalendar.previousElementSibling.classList.add('calendar-active');

          if(UCalendar.isCallable(onChangeMonth)){
            onChangeMonth(document.querySelector('.calendar-active'));
          }
      }
    }

    this.isCallable = function(func){
      return typeof func === 'function';
    }
}

const UICalendar = function({startsOn, monthName, numberDaysInMonth, monthId, year}){

    const emptyStartDays = (startsOn - 1);
    const emptyEndDays = (42 - ((startsOn - 1) + numberDaysInMonth));

    this.firstDayAttributes = `class='first-day month-day' style='--first-day-start: ${startsOn}'`;
    
    // this.HtmlMonthDays = [...Array(numberDaysInMonth).keys()].map((dayIndex) =>
    // `<li ${dayIndex === 0 ? this.firstDayAttributes : 'class="month-day"'} data-day-id="${monthId}-${UCalendar.toValidDateNumber(dayIndex + 1)}">${dayIndex + 1}</li>\n`
    // );

    this.HtmlMonthDays = [...Array(numberDaysInMonth).keys()].map((dayIndex) =>
    `<li ${dayIndex === 0 ? this.firstDayAttributes : 'class="month-day"'} data-day-id="${monthId}-${UCalendar.toValidDateNumber(dayIndex + 1)}">${dayIndex + 1}</li>\n`
    );

    this.fillDaysStart = [...Array(emptyStartDays).keys()].map((dayIndex) =>
        `<li class="month-day"> </li>\n`
        );
    this.fillDaysEnd = [...Array(emptyEndDays).keys()].map((dayIndex) =>
        `<li class="month-day"> </li>\n`
    );

    this.HtmlWeekDays = UCalendar.weekDays.map((dayName) => `<li class='day-name'>${dayName}</li> \n`);

    this.customeHtmlCalendar = function(callback){
      const getCalendarInfo = {startsOn, monthName, numberDaysInMonth, monthId, year, HtmlMonthDays: this.HtmlMonthDays, HtmlWeekDays: this.HtmlWeekDays,fillDaysStart: this.fillDaysStart,fillDaysEnd: this.fillDaysEnd};
        return callback(getCalendarInfo);
    }

    this.HtmlMonthCalendar = `
    <div data-month-id="${monthId}" class="max-w-xs w-4/5 mx-auto hidden ${UCalendar.getMonthCalendarInfo().monthId === monthId ? 'calendar-active': ''}">
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
const UICustomeFullCalendar = function({year, target, onDayPicked, onEmptyDates, onChangeMonth}){
    const these = this;
    const _Year = year || UCalendar.Now().Year;
    this._Year = _Year;
    this.target = target;
    this.calendarTemplate;

    this.UIcalendarData = function(_Year){
      return UCalendar.getYearCalendarInfo(_Year).map((element) => new UICalendar(element))
    };
    
    this.generateCalendar = function(callback, year){
      const calendarHTML = this.UIcalendarData(year).map((HtmlCalendar) => HtmlCalendar.customeHtmlCalendar(callback)).join('');
      target.innerHTML = calendarHTML;
    };

    this.generateNewMonth = function(year, month){
        const nextMonthInfo = UCalendar.getMonthCalendarInfo(year, month);
        target.innerHTML += new UICalendar(nextMonthInfo).customeHtmlCalendar(this.calendarTemplate);
    }

    
    this.CustomeUI = function(callback){
        this.calendarTemplate = callback;
        this.generateCalendar(this.calendarTemplate, _Year);
    }

    const pickedDays = new UDatePicker(these, onDayPicked, onEmptyDates);
    const UXcontroll = new UXCalendar(these, onChangeMonth);

    this.getDates = function(){
      return pickedDays.savedDates;
    }

    document.addEventListener('DOMContentLoaded', function(){

        if(typeof target !== 'object') return null;

        const activeCalendar = document.querySelector('.calendar-active');
        
        if(UCalendar.isCallable(onChangeMonth)){
          onChangeMonth(activeCalendar);
        }
        target.addEventListener('click', function(e){

          if(e.target.hasAttribute('data-arrow-prev')) {
              e.stopPropagation();
              UXcontroll.showPrevCalendar(e);
            }
            if(e.target.hasAttribute('data-arrow-next')) {
              e.stopPropagation();
              UXcontroll.showNextCalendar();
            }

            if(!UCalendar.isCalendarDate(e.target)) return null;

            const pickedDay = UCalendar.parser(e.target);

            if(!UCalendar.isAfterToday(pickedDay.date)) return null;            
            
            pickedDays.pickDate(pickedDay);

        })
    })
    
}