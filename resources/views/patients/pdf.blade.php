<div>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif
        }

        .patient-info,
        .patient-allergies,
        .patient-diseases {
            display: block;
            padding: 1rem;
        }

        .title {
            min-width: 100%;
            border-bottom: 1px solid black;
            margin-bottom: 1rem;
        }

        .patient-row {
            width: 11.5rem;
            text-align: center
        }

        .content-row {
            width: 15rem;
            text-align: center
        }
    </style>
    <div class="patient-info">
        <h3 class="title">Informacion de paciente</h3>
        <table>
            <tbody>
                <tr>
                    <td class="patient-row">{{ $patient->name }}</td>
                    <td class="patient-row">{{ $patient->age }}</td>
                    <td class="patient-row">{{ $patient->race }}</td>
                    <td class="patient-row"><img style="width: 10rem; height: auto;"
                            src="{{ 'profile_images/' . $patient->profile_image}}" alt="{{ $patient->name }}"></td>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="patient-allergies">
        <h3 class="title">Enfermedades</h3>
        <table>
            <thead>
                <th class="content-row">Nombre</th>
                <th class="content-row">Tratamiento</th>
                <th class="content-row">Fecha de Tratamiento</th>

            </thead>
            <tbody>
                @foreach($patient->diseases as $disease)
                <tr>
                    <td class="content-row">{{ $disease->name }}</td>
                    <td class="content-row">{{ $disease->treatment->name ?? 'No Seleccionado'
                        }}</td>
                    <td class="content-row">{{ $disease->treatment->created_at->addHours(4) ?? 'No Seleccionado' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="patient-diseases">
        <h3 class="title">Alergias</h3>
        <table>
            <thead>
                <th class="content-row">Nombre</th>
                <th class="content-row">Tratamiento</th>
                <th class="content-row">Fecha de Tratamiento</th>

            </thead>
            <tbody>
                @foreach($patient->allergies as $allergy)
                <tr>
                    <td class="content-row">{{ $allergy->name }}</td>
                    <td class="content-row">{{ $allergy->treatment->name ?? 'No Seleccionado'
                        }}</td>
                    <td class="content-row">{{ $allergy->treatment->created_at ?? 'No Seleccionado'
                        }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
