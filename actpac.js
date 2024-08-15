const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
var respuesta = document.getElementById('respuesta');
const expresiones = {
    ci:/^\d{7,8}$/,
    email:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    ap1:/^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    ap2:/^[a-zA-ZÀ-ÿ\s]{0,10}$/,
    no1:/^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    no2:/^[a-zA-ZÀ-ÿ\s]{0,10}$/,
    fnac:/^\d{4}-\d{2}-\d{2}$/,
    ntel: /^\d{10}$/,
    sex: /^(F|M|O)$/,
    tsangre: /^(A|B|AB|O)$/,
    fsangre: /^RH[+-]$/,
    falerg: /^[A-Za-z0-9áéíóúÁÉÍÓÚ,.\n\s]+$/u,
    fcong: /^[A-Za-z0-9áéíóúÁÉÍÓÚ,.\n\s]+$/u,
    fmot: /^[A-Za-z0-9áéíóúÁÉÍÓÚ,.\n\s]+$/u,
    est: /^\d+\.\d+$/,
    peso: /^\d+\.\d+$/
}
const campos =
{
    ci:false,email:false,ap1:false,ap2:false,no1:false,no2:false,fnac:false,
    ntel: false,sex: false,tsangre: false,fsangre:false,falerg: false,fcong:false,
    fmot: false,est:false,peso:false
}

const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "ci":
            validarInput(expresiones.ci,e.target,'ci');
        break;
        case "email":
            validarInput(expresiones.email,e.target,'email');
        break;
        case "ap1":
            validarInput(expresiones.ap1,e.target,'ap1');
        break;
        case "ap2":
            validarInput(expresiones.ap2,e.target,'ap2');
        break;
        case "no1":
            validarInput(expresiones.no1,e.target,'no1');
        break;
        case "no2":
            validarInput(expresiones.no2,e.target,'no2');
        break;
        case "fnac":
            validarInput(expresiones.fnac,e.target,'fnac');
        break;
        case "ntel":
            validarInput(expresiones.ntel,e.target,'ntel');
        break;
        case "sex":
            validarInput(expresiones.sex,e.target,'sex');
        break;
        case "tsangre":
            validarInput(expresiones.tsangre,e.target,'tsangre');
        break;
        case "fsangre":
            validarInput(expresiones.fsangre,e.target,'fsangre');
        break;
        case "falerg":
            validarInput(expresiones.falerg,e.target,'falerg');
        break;
        case "fcong":
            validarInput(expresiones.fcong,e.target,'fcong');
        break;
        case "fmot":
            validarInput(expresiones.fmot,e.target,'fmot');
        break;
        case "est":
            validarInput(expresiones.est,e.target,'est');
        break;
        case "peso":
            validarInput(expresiones.peso,e.target,'peso');
        break;
    }
}

const validarInput = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        if(`${campo}`=='ap2'||`${campo}`=='no2')
        {
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campos[campo] = true;
        }
        else
        {
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campos[campo] = true;
        }
    }
    else
    {
        if(`${campo}`=='ap2'||`${campo}`=='no2')
        {
            if((`${campo}`=='ap2')==null||(`${campo}`=='no2')==null)
            {
                document.getElementById(`${campo}`).classList.add('border-success','border-2');
                campos[campo] = false;
            }
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove('border-success','border-2');
            campos[campo] = false;
        }
        else
        {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove('border-success','border-2');
            campos[campo] = false;
        }
    }
}
inputs.forEach(
(inputs)=>
{
    inputs.addEventListener('keyup',validarFormulario);
    inputs.addEventListener('blur',validarFormulario);
})
formulario.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.ci&&campos.email&&campos.ap1&&campos.no1&&campos.fnac&&campos.ntel&&campos.sex&&campos.tsangre&&campos.fsangre&&campos.falerg&&campos.fcong&&campos.fmot&&campos.est&&campos.peso)
    {
        var datos = new FormData(formulario);
        fetch('actpac.php',
        {
            method:'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data =>
            {
                if(data!='error')
                {
                    respuesta.innerHTML=`
                        <div class="alert alert-success rounded-4 fs-6 fw-bold w-50" role="alert">
                            Actualizacion exitosa, para aplicar los cambios vuelva a <a href='login.html'>Iniciar Sesión</a>
                        </div>`
                    setTimeout(()=>
                        {
                            respuesta.innerHTML=``
                        }, 8000);
                }
            })
    }
    else
    {
        
        respuesta.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 fw-bold " role="alert">
            Por favor, asegurese de dar click en todos los campos y que estén en color verde.
        </div>`
        setTimeout(()=>
                    {
                        respuesta.innerHTML=``
                    }, 6000);
    }
})