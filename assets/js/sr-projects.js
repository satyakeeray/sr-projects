jQuery(document).ready(function($) {
    console.log(srProjectsAjax.ajax_url);
    jQuery(document).on('click', '#load-projects-button', function() {
        console.log('Load Projects button clicked');
        jQuery.ajax({
            url: srProjectsAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'load_projects',
                nonce: srProjectsAjax.nonce
            },
            success: function(response) {
                console.log('AJAX response:', response);
                console.log( response.data );
                if(  response.success ) {
                    var data = response.data;
                    var html = '';
                    data.forEach(function(project) {
                        html += '<div class="project-item">';
                            html += '<h3>' + project.title + '</h3>';
                            html += '<p>Status: ' + project.status + '</p>';
                            html += '<p>Client: ' + project.client_name + '</p>';
                            html += '<p>Budget: ' + project.budget + '</p>';
                        html += '</div>';
                        html += '<hr>';
                    });
                    jQuery('#projects-container').html(html);
                } else {
                    jQuery('#projects-container').html('<p>No projects found.</p>');
                } 
            },
            error: function(xhr, status, error) {
                jQuery('#projects-container').html('<p>Something went wrong. Please try again later.</p>');
            }
        });
    });
});
