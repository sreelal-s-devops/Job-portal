<div>
       
        @foreach ($options as $option)
            <table>
                <tr>
                    <td>
                        <input type="radio" name="{{ $name }}" value="{{ $option }}" id="{{ $option }}" @checked(request($name) === $option)>
                    </td>
                    <td>{{ $option }}</td>
                </tr>
            </table>
        @endforeach

</div>
