# PHP Tool: Censor Links and Email Addresses in a Body Text

This is a simple PHP censoring tool used to hide emails and links in a text. Can get pretty useful when having to deal with a similar thing on data taken from the database.

## Sample

1. Open your terminal and make sure you have PHP installed in your machine.
2. Go to the root of this project.
3. Command `php index.php` and see the filtered content of `test.html` in your terminal.

## Sample Output

**This is the output of applying it to the content of `test.html`:**

```
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor euismod arcu, at efficitur justo. Sed at bibendum augue. In hac habitasse platea dictumst. 

If you have any questions, please feel free to contact us at <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">****************</strong> or <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">************************</strong>. 

You can also visit our website at <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">********************</strong> for more information about our products and services.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula massa ac lectus euismod, ac consequat arcu tristique. Nullam vehicula risus vitae nibh fermentum, eu pellentesque libero fringilla. Curabitur nec tortor non metus eleifend varius. 

If you need assistance, you can reach out to our customer support team at <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">************************</strong>.

Suspendisse potenti. Proin a nisl vel justo varius fringilla. Cras feugiat, nunc vel malesuada tristique, arcu nulla dapibus dui, nec consectetur libero ligula non neque. 

Visit our blog for the latest updates: <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">****</strong>.

Aenean volutpat neque vel justo bibendum, vel consequat leo tempor. Donec eu dapibus metus. 

For partnership inquiries, please email <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">***********************</strong>.

In hac habitasse platea dictumst. Fusce nec nulla vel nisi tempus rhoncus. 

Check out our social media profiles:
- Facebook: <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">********</strong>
- Twitter: <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">*******</strong>
- Instagram: <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">*********</strong>

Nunc cursus dolor vel est convallis, at condimentum odio venenatis. Maecenas tincidunt, libero at fringilla hendrerit, dolor velit aliquam arcu, vel suscipit sapien purus sed nulla. 

Feel free to explore our products and services on our website: <strong class="censored-text" data-notice="You must be at least a basic plan subscriber to display links and emails in your job posts.">********</strong>.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non sem id tellus laoreet bibendum.
```
