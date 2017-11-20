function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }

  function editTitle(num){
  //  var title = document.getElementById('teste');
    var title = document.getElementsByClassName("intro");
    var span = title[num].firstChild;
    console.log("NUMERO"+num);
    span.onmouseover = function(){
      this.title = 'Clique para editar o textoaaaa';
      this.style.background = '#f5f5f5';
    }
    span.onmouseout = function(){
      this.title = '';
      this.style.background = '';
    }
    span.onclick = function(){
      var textoAtual = this.firstChild.nodeValue;
      var input = '<input type="text" size="5%" name="1"   value="'+textoAtual+'">';
      this.innerHTML = input;
      var field = this.firstChild;
      this.onclick = null;
      this.onmouseover = null;
      field.focus();
      field.select();
      field.onblur = function(){
        this.parentNode.innerHTML = this.value;
        editTitle();
      }
    }
  }
