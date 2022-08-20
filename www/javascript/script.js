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