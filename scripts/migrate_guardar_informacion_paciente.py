from pathlib import Path
import re

root = Path('c:/laragon/www/medsdi')
files = [
    'resources/views/template/dental/template_endo.blade.php',
    'resources/views/template/dental/template_od_gral.blade.php',
    'resources/views/template/dental/template_od_impl.blade.php',
    'resources/views/template/dental/template_period.blade.php',
    'resources/views/template/gineco_obstetricia/template_gine_obst.blade.php',
    'resources/views/template/medicina/template.blade.php',
    'resources/views/template/otros_profesionales/template_enfermeria.blade.php',
    'resources/views/template/otros_profesionales/template_psicologia.blade.php',
    'resources/views/template/pediatria/template_pediatria.blade.php',
    'resources/views/template/template_bronco.blade.php',
    'resources/views/template/template_cardiologia.blade.php',
    'resources/views/template/template_cda.blade.php',
    'resources/views/template/template_cdb.blade.php',
    'resources/views/template/template_cir_digest.blade.php',
    'resources/views/template/template_cirugia_general_urgencia.blade.php',
    'resources/views/template/template_cirugia_general.blade.php',
    'resources/views/template/template_dermato.blade.php',
    'resources/views/template/template_gastro.blade.php',
    'resources/views/template/template_homeopatia.blade.php',
    'resources/views/template/template_neuro.blade.php',
    'resources/views/template/template_oftalmologia.blade.php',
    'resources/views/template/template_orl.blade.php',
    'resources/views/template/template_siquiatria.blade.php',
    'resources/views/template/template_traumato.blade.php',
    'resources/views/template/template_traumatologia_general.blade.php',
    'resources/views/template/template_urologia.blade.php',
]
pattern = re.compile(r'\s*function editarInformacionPaciente\(\)\{[\s\S]*?function buscar_ciudad_paciente\(', re.MULTILINE)
include_line = "    @include('includes.guardar_informacion_paciente')\n"

for rel in files:
    path = root / rel
    if not path.exists():
        print('MISSING', rel)
        continue

    text = path.read_text(encoding='utf-8', errors='ignore')
    m = pattern.search(text)
    if not m:
        print('NO BLOCK', rel)
        continue

    new_text = text[:m.start()] + 'function buscar_ciudad_paciente(' + text[m.end():]

    if include_line.strip() not in new_text:
        if "@yield('js_inferior')\n" in new_text:
            new_text = new_text.replace("@yield('js_inferior')\n", "@yield('js_inferior')\n" + include_line, 1)
        elif "@yield('page-script')\n" in new_text:
            new_text = new_text.replace("@yield('page-script')\n", include_line + "@yield('page-script')\n", 1)

    if new_text != text:
        path.write_text(new_text, encoding='utf-8')
        print('UPDATED', rel)
    else:
        print('NO CHANGE', rel)
