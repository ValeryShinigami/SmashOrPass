
   function ajouter (){

    const likeBtn = document.getElementById('smash');
    let countSmash = document.getElementById('smashes');

    let int = 0;
    

    likeBtn.addEventListener ("click", ()=>{
        int +=1;
        countSmash.innerHTML = int;
    });
   }

   ajouter();
   
   function pass (){

    const likeBtn = document.getElementById('pass');
    let countSmash = document.getElementById('passes');

    let int = 0;
    

    likeBtn.addEventListener ("click", ()=>{
        int +=1;
        countSmash.innerHTML = int;
    });
   }

   pass();



