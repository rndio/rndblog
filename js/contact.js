document.addEventListener("DOMContentLoaded",function(){
  const apiURL = "https://api.rndio.my.id/contact";
  const form = document.getElementById("c-form");
  const aChkBox = document.getElementById("c-achkbox");
  
  function loader(e){
    const t = document.getElementById("c-backdrop");
    e?t.classList.add("active"):t.classList.remove("active");
  };

  function aChkBoxSwitcher(e){
    if(e){aChkBox.checked=true; form.name.value=""; form.name.disabled=true; form.name.required=false; form.email.value=""; form.email.disabled=true; form.email.required=false;}
    else{aChkBox.checked=false; form.name.value=""; form.name.disabled=false; form.name.required=true; form.email.value=""; form.email.disabled=false; form.email.required=true;}
  };

  const awn = new AWN({
    position:"bottom-right",
    maxNotifications:3,
    durations:{
      global:3000
    },
    icons:{
      enabled:1,
      prefix:"<i class='",
      suffix:"'></i>",
      success:"ri-checkbox-circle-fill",
      alert:"ri-error-warning-fill"
    }
  });

  form.addEventListener("submit", function(e){
    e.preventDefault();loader(1);
    fetch(apiURL, {method: e.target.method, body: new FormData(e.target)})
    .then((e)=>e.json())
    .then((e)=>{
      loader(0);
      form.reset();
      awn.success("Your Message Was Sent Successfully");
      aChkBoxSwitcher(0);
    })
    .catch((e)=>{
      loader(0);
      awn.alert(`${e.message}, Please Try Again Later`);
    });
  });


  aChkBox.addEventListener("change", function(e){
    e.preventDefault();
    switch(e.target.checked){
      case true: aChkBoxSwitcher(1); break;
      case false: aChkBoxSwitcher(0); break;
    }
  });
});