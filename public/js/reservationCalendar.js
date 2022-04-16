const saveDatesBtn = document.getElementById('save_date');
const form = document.getElementById('request_reservation');

const reservatioBtn = document.getElementById('save_date');

reservatioBtn.addEventListener('click', function(e){
    if(!form.date_end.value) {
        e.preventDefault();
        return ;
    }
});

const customeYearCalendar = new UICustomeFullCalendar({
    year: 2022,
    target: document.querySelector('#reservationCalendar'),
    onDayPicked: function(calendar){
        console.log(calendar.getDates())
        saveDatesBtn.classList.remove('btn-off');
        saveDatesBtn.classList.add('btn-on');

        // Save date

            form.date_start.value = calendar.getDates()[0].dateValue;
            form.date_end.value = calendar.getDates()[calendar.getDates().length - 1].dateValue;


/*             axios.post('https://ibimarine.test/admin/reservation',{
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'date_start': dateStart.dateValue,
                'date_end': dateEnd.dateValue,
            })
            .then((res) =>{
                console.log(res)
            })
            .catch((err) => {
                console.log(err)
            }); */
    },
    onEmptyDates: function(calendar){
            saveDatesBtn.classList.remove('btn-on');
            saveDatesBtn.classList.add('btn-off');
    },
    onChangeMonth: function(calendar){
        console.log(calendar)
        const baseUrl = 'http://ibimarine.test/admin/reservation/byAjax';
        let today =  UCalendar.getMonthCalendarInfo();
        let date_start = UCalendar.getMonthCalendarInfo(today.year , today.month + 1);
        // console.log(today);
        // console.log(date_start);
        axios.get(baseUrl, {
            params: {
                'date_start': '2022-04-27',
                'date_end': '2022-04-29',
            }
        })
            .then( function(response){

                if(!response.data) return null;
                const datesBetween = UCalendar.parsePeriod(response.data[0].start_date, response.data[0].end_date);
                datesBetween.forEach((UDate) => {
                    if(UDate.dateElement){
                        UDate.dateElement.style.background = 'grey';
                    }
                });
                console.log(datesBetween)
            })
            .catch(function(err){
                console.log(err);
            })
    }
});

customeYearCalendar.CustomeUI( function({monthName, monthId, year, HtmlMonthDays, HtmlWeekDays, fillDaysStart, fillDaysEnd}){
    return `
    <div data-date-id="${monthId}" class=" ${UCalendar.getMonthCalendarInfo().monthName === monthName ? 'calendar-active': ''} hidden reservation-calendar w-80 mx-auto font-bold">
    <!-- Calendar Head -->
    <div class="flex lg:mb-2 justify-center text-old-black h-11 items-center rounded-t-xl text-xl">
        <div style="width: 2rem" data-arrow-prev class="calendar-left-arrow cursor-pointer">
            <svg data-arrow-prev class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                <path data-arrow-prev fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path>
            </svg>
        </div>
          <div class="calendar__month_year font-bold mx-10 lg:text-2xl">
            <span class="calendar__month text-capitalize">${monthName}</span>
            <span class="calendar__year">${year}</span>
          </div>
        <div style="width: 2rem; text-align: end;" data-arrow-next class="calendar-right-arrow cursor-pointer">
            <svg data-arrow-next class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                <path data-arrow-next fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
            </svg>
        </div>
    </div>
    <!-- Calendar Body -->
    <div class="reservation_calendar__days-container text-center text-old-black">
        <ol class="calendar__days text-center grid grid-cols-7 pb-3 px-0 text-xl text-old-black">
            ${ HtmlWeekDays.join('') }
        </ol>
        <ol class="calendar__days calendar__numberDay text-center grid gap-y-6 gap-x-1 grid-cols-7 grid-rows-6 pb-3 px-0 text-xl">
            
            ${ fillDaysStart.join('') + HtmlMonthDays.join('') + fillDaysEnd.join('')}
        </ol>
    </div>
</div>
    `;
})