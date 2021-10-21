Login & register With 2FA in Codeigniter 

1.Extract The file.
2.Paste it in the htdocs
3.Create database with name 'ci3reglogin'
4.Import the database file(ci3reglogin.sql) present in Database folder 
5 Run the file at http://localhost/reglogin

Requirements
1] Registration
    o Form Include Following Field
        ▪ Name
        ▪ Username
        ▪ Email-id
        ▪ Password
        ▪ Confirm Password
    o Rules
        ▪ All Fields are mandatory
        ▪ Username & Email-Id Should be Unique
        ▪ Password Should be Encrypted for security Purpose
    o Message
        ▪ Success: You have successfully registered. Redirect to Login.
        ▪ Error: Show Respective Error Message.
2] Login
    o Form Include Following Field
        ▪ Username
        ▪ Password
        ▪ Captcha
    o Rules
        ▪ User can use email-id or username to login.
        ▪ Captcha Should be valid if captcha is invalid don’t check for credentials
        ▪ Credential incorrect for 3 times lock the account for 5 minutes.
            • Show Error Message once account is locked.
            • Show Error Message if user try to re-login that your account is
            locked during lock period.
        ▪ If first time login
            • Setup 2FA
                o Google Authenticator
                o Security Question
                    ▪ 5 Question
                    ▪ No Answer or Question Should be Repeated.
            • After success setup redirect to Login & Show Message you successfully have setup 2FA.
        ▪ Other Attempt
            • Let User Choose the 2FA Option
                o Security Question (If Selected)
                    ▪ Ask 2 Question (Random)
                    • If any one wrong change both question
                    (Random)
                    • If correct show welcome page
                o Google Authenticator (If Selected)
                    ▪ If wrong show error
                    ▪ If correct show welcome page