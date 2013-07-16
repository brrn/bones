<?php 
/* Template Name: Elements */
get_header();?>
<div id="content">

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="eightcol first clearfix" role="main">

              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                  <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
                  


                </header> <!-- end article header -->

                <section class="entry-content clearfix" itemprop="articleBody">
                  <h1>This is an h1 tag</h1>
                  <h2>This is an h2 tag </h2>
                  <h3>This is an h3 tag</h3>
                  <h4>This is an h4 tag</h4>
                  <h5>This is an h5 tag</h5>
                  <h6>this is an h6 tag</h6>

                  <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <br> (line break)
                  <hr> (horizontal rule)
                  <!-- This is a comment -->
                  <h4>Formatting</h4>
                  <b>Bold text</b><br/>
                  <code>Computer code</code><br/>
                  <em>Emphasized text</em><br/>
                  <i>Italic text</i><br/>
                  <pre>Preformatted text</pre><br/>
                  <small>Smaller text</small><br/>
                  <strong>Important text</strong><br/>

                  <abbr> (abbreviation) </abbr>
                  <address> (contact information) </address>
                  <blockquote> blockquote <br/>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,  </blockquote>
                  <cite> blockquote cite </cite><br/><br/>
                  <del> (deleted text) </del><br/>
                  <ins> (inserted text) </ins><br/>
                  <sub> (subscripted text) </sub><br/>
                  <sup> (superscripted text) </sup><br/>
                  
                  <h4>Links</h4>
                  Ordinary link: <a href="http://www.example.com/">Link-text goes here</a><br/>
                  Mailto link: <a href="mailto:webmaster@example.com">Send e-mail</a>
                  

                  <h4>Images</h4>
                  <img src="http://fakeimg.pl/250x100/">
                  
                  <h4>Lists</h4>                 
                  <p>Unordered List</p>
                  <ul>
                    <li>Item</li>
                    <li>Item</li>
                  </ul>
                  <p>Ordered list</p>
                  <ol>
                    <li>First item</li>
                    <li>Second item</li>
                  </ol>
               
                  Tables
                  <table border="1">
                    <tr>
                      <th>table header</th>
                      <th>table header</th>
                    </tr>
                    <tr>
                      <td>table data</td>
                      <td>table data</td>
                    </tr>
                  </table>

                  <h4>Forms</h4>
                  <form action="demo_form.asp" method="post/get"><br/>
                  <input type="text" name="email" size="40" maxlength="50"><br/>
                  <input type="password"><br/>
                  <input type="checkbox" checked="checked"><br/>
                  <input type="radio" checked="checked"><br/>
                  <input type="submit" value="Send"><br/>
                  <input type="reset"><br/>
                  <input type="hidden"><br/>
                  <select>
                  <option>Apples</option>
                  <option selected="selected">Bananas</option>
                  <option>Cherries</option>
                  </select><br/>

                  <textarea name="comment" rows="10" cols="20"></textarea>

                  </form>
              </section> <!-- end article section -->

                <footer class="article-footer">
                  <?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>

                </footer> <!-- end article footer -->

                <?php comments_template(); ?>

              </article> <!-- end article -->

              <?php endwhile; else : ?>

                  <article id="post-not-found" class="hentry clearfix">
                    <header class="article-header">
                      <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
                    </header>
                    <section class="entry-content">
                      <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
                    </footer>
                  </article>

              <?php endif; ?>

            </div> <!-- end #main -->

            <?php get_sidebar(); ?>

        </div> <!-- end #inner-content -->

      </div> <!-- end #content -->



get_footer();
?>