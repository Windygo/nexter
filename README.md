**Nexter**

  A WP theme excercise focused on building a responsive WP front page from scratch using https://underscores.me/ generated template
  
  **Plugins** - 1 x plugin - Advanced Custom Fields PRO - Adds Options page to admin 
  
  **CSS** - No framework fo any kind. Use of CSS GRID & Flex. Class naming - BEM convention.
  
  **jquery** - Not used
  
  **Custom Post Types**:  Realtors, Features, Properties
  
  **ACF Field Groups**
          
  **Features** are posts under the here area. CPT Features.
  
    show_feature -  T/F field set by default to T.  If unchecked, post will not appear on front page. 
    
    fa-icon - Accepts a Font Awesome HTML tag to form a symbol (icon) for the post
        
  **Logos** allow changing the logos in the here area (top of page)
  
    top-logo - Image url. Main centered top most logo. Can be changed as needed from Media library.
    
    seen_on_logo_1 .. seen_on_logo_4 - Image url. Can be changed as needed from Media library.
  
  **Properties** this ACF field group of total 6 fields feed the property cards - CPT Properties. 
  
    country - Text field for country name.
    
    rooms - Number field with steps of 0.5
    
    floor_area - Number field. Denotes the floor area in sq. meters.
    
    price - Number. The price is in USD.
    
    contact_label - Text field. Allows customization of card button with default set to 'Contact Realtor'.
    
    show_propety -  T/F field set by default to T.  If unchecked, post will not appear on front page. 
  
  **Realtors** The posts appearing at the right of the hero area. CPT Realtors.
  
  house_sold - Numbe field that deontes how many houses each realtor sold. This info appears below the realtor's name.
  
  show_realtor - T/F field set by default to T.  If unchecked, post will not appear on front page. 
  
  Notes:
  
  The custom query sorts the realors in DESC order based on the number of houses each sold.
  
  Also when a realtor is hidden, the title above the Top 3 changes as needed based on actual count of realtors shown.
  
  **Slider**
  
  slider_title  - Text field. Shows be default 'Trending Properties'.
  
  slider_gallery - Gallery field. Creates an array of images URLs. 
  An array variable is passed by json_encode (line 240 on front-page.php) where slider.js uses it to manipulate the slides.
  
  **Story**
  
  bg_image - Image url field. Sets background image for the story
  
  ol_image - Image url field. Sets the overlayed image that is centered over the background image.
  
  os_image - Image url field. Sets the off set image that croses the centerline to the right.
  
  story_opener - Text field. Value can be set on options page.
  
  story_title - Text field. Value can be set on options page.
  
  story_text - Text field. Value can be set on options page.
   
  story_button_label - Text field. Value can be set on options page.
  
  **Footer**
  
  Footer is a dynamic menu. It also responsive. On small screens it becomes verticls using Flex column.
  
  
  **Notes **
  
    -Font Awesome Pro icons package installed with npm

    -sass/nexter folder contains all actualy sass component files the correspond with mathing html

    -main.scss imports all component _scss files

    -Theme variables:  Color Variables, Font variables, Break Point variables found on _base.scss
    
  **Migration Notes**
   
     - The site is live
     - Security plugin added for hardening the site
     - Migration steps included:
        a. Cloning this repo
        b. Copying local uploads folder with all media (outside this repo) to production server
        c. Exporting local database and editing the database (find replace...)
          - //nexter.local to production URL
          - //app/public  to /public_htmel/<folder-name>
        d. Importing the above modifiend datbase into an empty databse on production site.
        d. Installing local plugins on remote (outside this repo)
        e. Copying local wp-config to production server and editing db / user name etc. to match production env.
  
  
  
  
  
   
   
  
  
  
  
