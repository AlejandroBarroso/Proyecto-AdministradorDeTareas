!function(){function e(e,t,a){const n=document.querySelector(".alerta");n&&n.remove();const r=document.createElement("DIV");r.classList.add("alerta",t),r.textContent=e,a.parentElement.insertBefore(r,a.nextElementSibling),setTimeout(()=>{r.remove()},5e3)}document.querySelector("#agregar-tarea").addEventListener("click",(function(){const t=document.createElement("DIV");t.classList.add("modal"),t.innerHTML='\n            <Form class="formulario nueva-tarea">\n                <legend>Añade Una Nueva Tarea</legend>\n                    <div class="campo">\n                        <label>Tarea</label>\n                        <input\n                            type="text"\n                            name="tarea"\n                            placeholder="Añadir Tarea al Proyecto Actual"\n                            id="tarea"\n                        />\n                    </div>\n                    <div class="opciones">\n                        <input type="submit" class="submit-nueva-tarea" value="Añadir Tarea"/>\n                        <button type="button" class="cerrar-modal">Cancelar</button>\n                     </div>\n            </form>\n        ',setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),t.addEventListener("click",(function(a){if(a.preventDefault(),a.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{t.remove()},500)}a.target.classList.contains("submit-nueva-tarea")&&function(){const t=document.querySelector("#tarea").value.trim();if(""===t)return void e("El nombre de la tarea es obligatorio","error",document.querySelector(".formulario legend"));!async function(t){const a=new FormData;a.append("nombre",t),a.append("proyectoId",function(){proyectoParams=new URLSearchParams(window.location.search);return Object.fromEntries(proyectoParams.entries()).id}());try{const t="http://localhost:3000/api/tarea",n=await fetch(t,{method:"POST",body:a}),r=await n.json();console.log(r),e(r.mensaje,r.tipo,document.querySelector(".formulario legend"))}catch(e){console.log(e)}}(t)}()})),document.querySelector(".dashboard").appendChild(t)}))}();