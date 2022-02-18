//SELECTS 


//VARIABLES



//SELECT ORGANISMOS 

(function($){
  $('#select-organismos').on('change', ()=>{

  let select = $('#select-organismos').val();
  let select_name = $('#select-organismos').find('option:selected').text();
  let option = document.querySelector("option");

  let data = select.split(",");
  data = data.map((el)=>{
    return el.trim();
  });  

  
  var names = [];
  var slugs = [];  

  function splitArray(candid) {

    for(var i=0; i<candid.length; i++)
        (i % 2 == 0 ? slugs : names).push(candid[i]);
    return [slugs, names];
}

splitArray(data);


  let sel = document.getElementById('select-provincias');
  let newClassname = select_name.toLowerCase() + '--done';
          
          if(!sel.classList.contains(newClassname)){
              append_options(); 
          }
          
          let provinciales = document.getElementsByClassName('provinciales');
          let ongs = document.getElementsByClassName('ongs');
          let div = document.createElement('div');
          let div_nac = document.getElementById('div-nacionales');
          switch(select_name){
                  case "Nacionales":
                    $(div_nac).removeClass('display--n');
                    $(div_nac).addClass('display--b');
                    if(!(div_nac.classList.contains(newClassname))){
                    
                    div.className = 'content';
                    div.innerHTML = select;
                    div_nac.appendChild(div);
                    div_nac.classList.add(newClassname);
                    $(div).addClass("display--b");
                      $(provinciales).addClass("display--n");
                      $(ongs).addClass("display--n");
                      $(div).removeClass("display--n");
                      $(ongs).removeClass("display--b");
                      $(provinciales).removeClass("display--b");}
                      break;
                  case "Provinciales":
                      $(provinciales).addClass("display--b");
                      $(ongs).addClass("display--n");
                      $(div).addClass("display--n");
                      $(provinciales).removeClass("display--n");
                      $(ongs).removeClass("display--b");
                      $(div).removeClass("display--b");
                  break;
                  case "ONGs":
                      $(ongs).addClass("display--b");
                      $(provinciales).addClass("display--n");
                      $(div).addClass("display--n");
                      $(provinciales).removeClass("display--b");
                      $(ongs).removeClass("display--n");
                      $(div).removeClass("display--b");
                  break;
                  
                  default: 
                      $(provinciales).addClass("display--n");
                      $(ongs).addClass("display--n");
                      $(div).addClass("display--n");
                      
                  break;
          }

          function append_options(){
            if(!(select_name == 'Nacionales')){
              if(!sel.classList.contains(newClassname)){
                for (let i= 0; i< slugs.length-1; i++) {
                let opt = document.createElement('option');
                opt.className = select_name.toLowerCase();
                opt.value = slugs[i];
                opt.text = names[i];
                sel.classList.add(newClassname);
                sel.appendChild(opt);           
                }
            }   
            }
               
      }
  })

})(jQuery);


//SELECT PROVINCIAS 


(function($){
  $('#select-provincias').on('change', ()=>{

  let select = $('#select-provincias').find('option:selected').val();

  let div_nac = document.getElementById('div-nacionales');
  $(div_nac).addClass('display--n');


  let divs = document.getElementsByClassName(select);

    if ((select)){
      $(divs).addClass("display--b");
      $(divs).removeClass("display--n");

}
      $('#select-provincias').on('change', (e) =>{
        e.preventDefault();

        $(divs).addClass("display--n");
        
        
        
      })
    
  })
  
  
})(jQuery);

