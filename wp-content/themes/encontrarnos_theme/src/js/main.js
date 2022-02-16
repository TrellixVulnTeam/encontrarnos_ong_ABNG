//SELECTS 


//VARIABLES



//SELECT ORGANISMOS 

(function($){
  $('#select-organismos').on('change', (e)=>{

  e.preventDefault();

  let select = $('#select-organismos').val();
  let select_name = $('#select-organismos').find('option:selected').text();


  let data = select.split(",");
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
                for (let i= 0; i< data.length-1; i++) {
                let opt = document.createElement('option');
                opt.className = select_name.toLowerCase();
                opt.value = data[i];
                opt.text = data[i];
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
  $('#select-provincias').on('change', (e)=>{

  e.preventDefault();

  let select = $('#select-provincias').val();
  let select_name = $('#select-provincias').find('option:selected').text();

  let div_nac = document.getElementById('div-nacionales');
  $(div_nac).addClass('display--n');


  let divs = document.getElementsByClassName(select);
  


  
  $(divs).toggleClass('display--n display--b');

  for (let i= 0; i< divs.length; i++) {
    console.log('hola');
    let firstClass= divs[i].className.split('  ')[0];
    console.log(firstClass);
    if (select_name === firstClass) {
      divs[i].style.display = 'block';
      $(divs[i]).addClass('was--selected');
      console.log('coincide');    
      }$('#select-provincias').on('change', () =>{
        divs[i].style.display = 'none';
      })
      $('#select-organismos').on('change', () =>{
        let select_name = $('#select-organismos').find('option:selected').text();
          if(select_name == 'Nacionales'){
            divs[i].style.display = 'none';
          }
      })
    }
  })
})(jQuery);
