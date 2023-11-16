<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Contact -->
    <section id="contact">
        <h2>Contact Us</h2>
        <div class="contact-container">
            <table class="contact-table">
                <tr>
                    <td><input type="text" name="nama" placeholder="Nama"></td>
                    <td><input type="email" name="email"placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="number" name="number" placeholder="Number"></td>
                    <td><input type="text" name="subject" placeholder="Subject"></td>
                </tr>
                <tr>
                    <td class="label" colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="message" rows="4"  placeholder="Message"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                        <button type="submit">Back to Dashboard</button><a href="user_statistic.php"></a>
                        <button type="submit">Send Message</button><a href="index.php"></a>
                    </td>
                </tr>
            </table>
        </div>
    </section>

</body>
</html>