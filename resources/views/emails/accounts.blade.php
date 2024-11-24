<x-layout-pdf :title="$title">

    <div style="font-family: Arial, sans-serif; margin: 20px;">
        <h1 style="font-size: 24px; color: #333;">Accounts</h1>
        <h2 style="font-size: 20px; color: #555;">User: {{ $userName }}</h2>
        <h2 style="font-size: 20px; color: #555;">Email: {{ $userEmail }}</h2>

        <h1 style="font-size: 24px; color: #333;">Download Accounts Information PDF</h1>
        <a href="{{ route('pdf.accounts') }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; border-radius: 5px; text-decoration: none; margin: 10px 0;">
            Click Here
        </a>
    </div>

</x-layout-pdf>