const back = document.querySelector("#back");
if(back){
    back.style.cursor = "pointer";
    back.addEventListener(EventNames.CLICK, () => {
        history.back();
    });
}

const sort = document.querySelector("#sort");
if(sort){
    sort.addEventListener(EventNames.CHANGE, sortChangeHandler);
}

function sortChangeHandler(evt){
    console.log(sort.value);
    window.location.href = "index.php?page=movies&sort=" + sort.value;
}

class AbstractSection extends EventTarget {
    constructor(containerDiv){
        super();
        this.containerDiv = containerDiv;
        this.dataSource;
    }

    init(dataSource){
        console.log("AbstractApp", "init", "app initialized.", dataSource);
        
        this.dataSource = dataSource;
        
        this.dispatchEvent(new CustomEvent(EventNames.INIT));
    }
}

class MovieSection extends AbstractSection{

    constructor(containerDiv){
        super(containerDiv);
    }

    init(dataSource){
        this.initProgressBar();
        super.init(dataSource);
    }

    initProgressBar(){
        const progressBar = new ProgressBar(this.containerDiv.querySelector("#rating"));
        progressBar.start();
    }

}

const ProgressBarInterval = {
    DEBUG: 1000,
    PROD: 5000,
    DELAY: 50
}

class ProgressBar extends AbstractUIComponent{

    constructor(UIView, disableColor = "#CCCCCC"){
        super(UIView);
        super.value = this.UIView.getAttribute("data-attr");
        this.boundProgress = this.progress.bind(this);
        this.intervalID;
        this.timer = 0;
        this.disableColor = disableColor;
        const progressBarDiv = this.UIView.querySelector("#progressBar");
        progressBarDiv.setAttribute("style", "width:" + 0 + "%");
    }

    start(){
        if(super.value != -1){
            this.intervalID = setInterval(this.boundProgress, 20);
        }else{
            const progressBarDiv = this.UIView.querySelector("#progressBar");
            // progressBarDiv.className = "disabled";
            progressBarDiv.setAttribute("style", "width:" + 100 + "%");
            progressBarDiv.style.backgroundColor = this.disableColor;
        }
    }

    stop(){
        clearInterval(this.intervalID);
    }

    progress(){
        const limit = debug ? ProgressBarInterval.DEBUG : ProgressBarInterval.PROD;
        const percent = Math.round(this.timer / limit * 100);
        this.timer += ProgressBarInterval.DELAY;
        const progressBarDiv = this.UIView.querySelector("#progressBar");
        progressBarDiv.setAttribute("style", "width:" + percent.toString() + "%");
        console.log(percent);
        if(percent >= super.value){
            this.stop();
            this.timer = 0;
        }
    }

}

// movie section
const movieSetionDiv = document.querySelector("#movie_section");
console.log(movieSetionDiv);

if(movieSetionDiv){
    const movieSection = new MovieSection(movieSetionDiv);
    movieSection.init(null);
}