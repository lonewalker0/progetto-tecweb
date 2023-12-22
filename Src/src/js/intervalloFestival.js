countdownFestival();
triggerView();
const getCountdown = (eventDate) =>{
   let countdownFestival = eventDate.getTime(); 
   
        let oggi = new Date().getTime();
        let intervallo = countdownFestival - oggi;
    
        let giorni = Math.floor(intervallo /(1000*60*60*24));
        let ore = Math.floor((intervallo %(1000*60*60*24))/ (1000*60*60)) ;
        let minuti = Math.floor((intervallo %(1000*60*60))/ (1000*60));
        let secondi = Math.floor((intervallo % (1000*60)) / 1000);
        
        if(intervallo < 0)
            return null;
        
        return "| " + giorni + "d " + ore + "h " + minuti + "m " + secondi + "s ";
}
function countdownFestival()
{
    const DOMELEMENT = document.getElementById("intervalloFestival")
    const eventDate = new Date("Jul 5, 2024 12:00:00")
    setInterval(() =>
    {   
        const countDown = getCountdown(eventDate);
        DOMELEMENT.innerHTML = (countDown || "EXPIRED") ;
     
    },1000);
}
function triggerView()
{
    const df = document.getElementById("dataFestival")
    const cd = document.getElementById("intervalloFestival")
    let type = true;
    setInterval(() =>{   
        type = !type;
        if(type){
            df.style.display = "block";            
            cd.style.display = "none";
        }else {
            df.style.display = "none";            
            cd.style.display = "block";
        }        
    },4000);
}


