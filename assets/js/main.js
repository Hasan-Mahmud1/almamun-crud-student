
const myinput = document.querySelector("#myinput");
myinput.addEventListener("keyup", filterPosts);

function filterPosts(){
    let value = myinput.value.toLowerCase();
    document.querySelectorAll("#mytable tr").forEach(post => {
        post.innerText.toLowerCase().indexOf(value) > -1
        ? post.style.display = ""
        : post.style.display = "none";
    });
}
   