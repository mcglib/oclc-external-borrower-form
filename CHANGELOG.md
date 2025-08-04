# CHANGELOG

1.1.26 - [2025/08/04]

- ADILS-1606 | Updated 
    - laravel version to 9 and Packages
    - updated code
    - changed .env mailhost , storage/cache to 755 

1.1.25 - [2025/07/03]

- ADILS-1606 | Updated pbkdf2 to 3.1.3 to avoid unintialized zero filled memory issue.

1.1.24 - [2025/04/01]

- Remove use of PROXY

1.1.23 - [2025/03/19]

- ADILS-1590 | Fixed vulnerabity in the simple saml code

1.1.22 - [2025/02/24]

- ADILS-1585 | Renamed the category for students at other unis


1.1.21 - [2024/12/13]

- ADILS-1573 | Fix the js so that the required asterix is show

1.1.20 - [2024/12/12]

- ADILS-1573 | Renaming McGill Library -> McGill Libraries
- ADILS-1573 - Added a check so that the McGill ID is required where needed.


1.1.19 - [2024/12/11]

- ADILS-1573 | Found another training slash


1.1.18 - [2024/12/11]

- ADILS-1573 | OCLC api changes | Review trailing slash support


1.1.17 - [2024/11/18]

- ADILS-1558 security update - http-proxy-middleware | external-borrower-form
- Downgrade to Laravel 8.

1.1.16 - [2024/10/16]

- ADILS-1555 Issue with API call. Re-enabled the form

1.1.15 - [2024/10/15]

- ADILS-1555 Issue with API call. Disable the form


1.1.14 - [2024/05/30]

- ADOML-173 - Updated the logo

1.1.14 - [2024/04/25]

- ADILS-1493 - Updated Banq and Faculty member at a Canadian University or Cégep (ARC)

1.1.13 - [2024/02/13]

- ADILS-1483 -  Fixed vulnerability mentioned in ADILS-1483

1.1.12 - [2023/11/07]

- ADILS-1467 - Fixed bug with McGill PhD Extension category on js changes
- ADILS-1467- Add new category - PhD Research Card

1.1.12 - [2023/11/07]

- ADILS-1467 - Fixed bug with McGill PhD Extension category on js changes
- ADILS-1467- Add new category - PhD Research Card

1.1.11 - [2022/08/15]

- ADGEN-1114 borrower form: Move email verification after api call
- Code cleanup to keep same styling

1.1.10.7 - [2022/05/17]
-improved patron type for faculty member

1.1.10.6 [2022/05/13]
-changed patron type for alumni to McG-Alumni

1.1.10.5 - [2022/05/13]
-Added insitutions and patron type for graduate student and Alumni value

1.1.10.4 - [2022/05/11]
-changed patron type to custom data 1

1.1.10.3 - [2022/05/11]
-integrated with OCLC (TIPASA)

1.1.10.2 - [2022/05/06]
-sorted borrower category
-changed MCLL category
-improved lecture course extension to have department value
1.1.10.1
-added date to 1.1.9.1 version

1.1.10 - [2022/04/29]

- Fixing the note field info for McGill ID.
- Added a new select field for Graduate student at university
- Clean up of text from uppercase to lowercase
- Change to different patron type

1.1.9.1 - [2021/12/31]

- fixing the note field info for mcgill id.

1.1.9

- Added a new patron value "casual staff" to borrower form
- Abit of code tidyup
1.1.8
- Updated varios node_module plugins
- Upgrading to laravel 7
- CEGEP accounts (ARC) should now be in borrower Category: McG – Extern. Agreements
1.1.7.1
- Added the full colon at the end of the submission statement
1.1.7
- Customized the output of the expiry date
1.1.6
- Updated the confirmation message so as to indicate the end of expiry date
1.1.5
- Changed the expiry date to one month
1.1.4
- Moved the home institutions to the top
1.1.3
- Added ARC/Association pour la recherche au collégial to list of home institutions
1.1.2
- Disabled the submit button to prevent double submissions
- Removed the extra data for custom data 4 that was not being sent
1.1.0
- Remove entry for Montreal School of Theology
- Update Osler/Rare Books reader entry to say Osler/Rare Books/Archives reader
1.0.33
- Fixing the date for laravel
1.0.32
- Removed the defaulttype of home from the address, phone and email
1.0.31
- Added home branch as a env variable
1.0.30
- Font size issues
- Ordering in home institutions
1.0.29
- borrower category fixes.
1.0.28
- Fixing the validation for BCI undergrads.
1.0.27
- Fixed typos and email wordings for the borrower email.
1.0.26
- Updated the home institutions lists.
- Moved the barcode into the top of lists.
1.0.25
- Updated the borrowing category for custom data 3 for school of theology.
1.0.23
- Updated the borrowing category amd updated the name of he emails and step2
1.0.22
- Various fixes to show address2, and province_state
1.0.21
- Added the telephone numbers
1.0.20
- Fixed bug with the barcode not being saved twice
1.0.19
- Added validation checks for string length
1.0.18
- Fxing the email verification step
1.0.17
- Removed the dash in the barcode
1.0.16
- Improved the error message for invalid email that does not exist
1.0.15
- Fixed error message 500.
1.0.14
- Fixed the colors for the back button.agin. caused by incorrect values in <a> href
1.0.13
- Implemented a verification check that will handle the 500 error msg when an email that does not exist
1.0.12
- Fixed the colors for the back button.
1.0.11
- Removed number format for telephone
1.0.10
- Added email error sending to dev.library
1.0.9
- Added email error sending to dev.library
- Fixed validations for form remembering
1.0.8
- Fixed the error page
- Tested the validations
- Tweaks to the UI
1.0.7
- Working email
- Tested the expiry dates
- tested adding a note field
1.0.6
- Added mailing capabilities
1.0.5
- Added status
1.0.4
- Added the working custom data.
- Added the universities
1.0.3
- Added the logo.
- Fixed the paths
1.0.2
- Added multi-step in the form
1.0.1
- Initial working draft
