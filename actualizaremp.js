const formulario1 = document.getElementById('formulario1');
const input1 = document.querySelectorAll('#formulario1 input');
var respuesta1 = document.getElementById('respuesta1');
function reinicio()
{
    location.href=location.href;
}
const expresiones1 = {
    ci: /^\d{7,8}$/
}
const campoci1 =
{
    ci:false
}
const validarFormulario1 = (e)=>{
    switch (e.target.name)
    {
        case "ci":
            validarCI1(expresiones1.ci,e.target,'ci');
        break;
    }
}
const validarCI1 = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campoci1[campo] = true;
    }
    else
    {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            campoci1[campo] = false;
    }
}
input1.forEach(
    (inputs)=>
    {
        inputs.addEventListener('keyup',validarFormulario1);
        inputs.addEventListener('blur',validarFormulario1);
    })
formulario1.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campoci1.ci)
    {
        var datos = new FormData(formulario1);
        fetch('actualizaremp.php',
        {
            method:'POST',
            body: datos
        })
    }
    else
    {
        
        respuesta1.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-25" role="alert">
            Por favor, provea la cédula correctamente.
        </div>`
        setTimeout(()=>
                    {
                        respuesta1.innerHTML=``
                    }, 4000);
    }
})