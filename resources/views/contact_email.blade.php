<!DOCTYPE html>
<html>

<head>
    <title>ItsolutionStuff.com</title>
</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>

    <h4>Hi Admin</h4>

    <h4>One User Wants to Connect with you.. Here the details</h4>

    <table>
        <tr>
            <td>Name</td>
            {{-- <td>{{ $data['name'] }}</td> --}}
            <td>{{ $data->name }}</td>
        </tr>

        <tr>
            <td>Email</td>
            {{-- <td>{{ $data['email'] }}</td> --}}
            <td>{{ $data->email }}</td>
        </tr>

        <tr>
            <td>Subject</td>
            {{-- <td>{{ $data['subject'] }}</td> --}}
            <td>{{ $data->subject }}</td>
        </tr>

        <tr>
            <td>Message</td>
            {{-- <td>{{ $data['message'] }}</td> --}}
            <td>{{ $data->message }}</td>
        </tr>

    </table>



    <p>Thank you</p>
</body>

</html>
