<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                 <div class="col-lg-12">
                     <b-card header="Headings" header-tag="h4" class="bg-success-card">
                         <div class="typo-heading mb-5">
                             <h1>
                                 <b> Heading 1</b>
                             </h1>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                             <h2>
                                 <b>Heading 2</b>
                             </h2>
                             <p>Distinctio eveniet id in maiores officiis qui sequi.</p>
                             <h3>
                                 <b> Heading 3</b>
                             </h3>
                             <p>Animi assumenda consequuntur error, et, ex illum.</p>
                             <h4>
                                 <b>Heading 4</b>
                             </h4>
                             <p> Cum delectus deleniti doloremque.</p>
                             <h5>
                                 <b>Heading 5</b>
                             </h5>
                             <p>Sint sit veritatis, vero! Nulla, quibusdam, recusandae.</p>
                             <h6>
                                 <b>Heading 6</b>
                             </h6>
                             <p>Incidunt libero nisi nostrum omnis quaerat quibusdam.</p>
                         </div>
                     </b-card>
                 </div>
                <div class="col-lg-12">
                    <b-card header="Blockquotes" header-tag="h4" class="bg-info-card">
                        <blockquote class="blockquote">
                            <p class="mb-0 ml-3">I am blockquoted for varying the content from another source within your document.
                            </p>
                        </blockquote>
                        <!--blockquote with inserted source-->
                        <p>The <code>.blockquote text-right</code> class gives the right-aligned blockquote.</p>
                        <blockquote class="blockquote text-center">
                            <p class="mb-0">I am blockquoted for varying the content from another source within your document.</p>
                            <footer class="blockquote-footer">Someone famous in
                                <cite title="Source Title">Source Title
                                </cite>
                            </footer>
                        </blockquote>
                        <p>The <code>&lt;footer class="blockquote text-center"&gt;</code> adds the source name for Identification.
                        </p>
                    </b-card>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                <div class="col-lg-12">
                    <b-card header="Contextual text colors" header-tag="h4" class="bg-primary-card">
                        <p class="text-default">I am the default colored text.</p>
                        <p class="text-primary">I am the text with the Primary color.</p>
                        <p class="text-success">I am with the color text-success.</p>
                        <p class="text-warning">I am the text with the warning color.</p>
                        <p class="text-info">I am the Primary color with text-info.</p>
                        <p class="text-danger">Text-danger colored text.</p>
                    </b-card>
                </div>
                <div class="col-lg-12">
                    <b-card header="  Inline elements" header-tag="h4" class="bg-danger-card">
                        <p>
                            <mark>I am</mark>
                            highlighted with the <code>mark</code> tag.
                        </p>
                        <p>
                            <del>I am striked using del tag to be treated as deleted text.</del>
                        </p>
                        <p>
                            <ins>This line of text is an addition to the document.</ins>
                        </p>
                        <p>
                            <small>This line of text is meant to be treated as small than usual.</small>
                        </p>
                        <p><strong>This line rendered as bold text with <code>strong</code> tag.</strong>
                        </p>
                    </b-card>
                </div>
                <div class="col-lg-12">
                    <b-card header="Horizontal Description" header-tag="h4" class="bg-success-card">
                        <div class="box-body">
                            <dl class="dl-horizontal">
                                <dt>
                                    Description lists
                                </dt>
                                <dd>
                                    A description list is perfect for defining terms.
                                </dd>
                                <dt>Question</dt>
                                <dd>
                                    Vestibulum id ligula porta felis euismod semper eget lacinia odio.
                                </dd>
                                <dt>
                                    Progress bar
                                </dt>
                                <dd>
                                    Etiam porta sem malesuada magna mollis euismod.
                                </dd>
                                <dt>Answer</dt>
                                <dd>
                                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, justo.
                                </dd>
                                <dt>
                                    Description lists
                                </dt>
                                <dd>
                                    A description list is perfect for defining terms.
                                </dd>
                                <dt>Question</dt>
                                <dd>
                                    Vestibulum id ligula porta felis euismod semper.
                                </dd>
                                <dt>Answer</dt>
                                <dd>
                                    Fusce dapibus, tellus ac cursus commodo, tortor, justo sit amet risus.
                                </dd>
                            </dl>
                        </div>
                        <!-- /.box-body -->
                    </b-card>
                </div>
                </div>
            </div>
        </div>
        <!--list styles-->
        <div class="row">
            <div class="col-lg-4">
                <b-card header="Unstyled List" header-tag="h4" class="bg-info-card">
                    <div class="box-body">
                        <ul class="list-unstyled list-lineheight">
                            <li>
                                Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                Facilisis in pretium nisl aliquet
                            </li>
                            <li>
                                Nulla volutpat aliquam velit
                                <ul>
                                    <li>
                                        Phasellus iaculis
                                    </li>
                                    <li>
                                        Sodales ultricies
                                    </li>
                                    <li>
                                        Ac tristique libero
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Faucibus porta lacus fringilla vel
                            </li>
                            <li>
                                Aenean sit amet erat nunc
                            </li>
                            <li>
                                Eget porttitor lorem
                            </li>
                        </ul>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-4">
                <b-card header="Unordered List" header-tag="h4" class="bg-success-card">
                    <div class="box-body">
                        <ul class="styled-ul p-l-25 list-lineheight">
                            <li>
                                Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                Consectetur adipiscing elit
                            </li>
                            <li>
                                Integer molestie lorem at massa
                            </li>
                            <li>
                                Nulla volutpat aliquam velit
                                <ul>
                                    <li>
                                        Phasellus iaculis
                                    </li>
                                    <li>
                                        Purus sodales ultr
                                    </li>
                                    <li>
                                        Ac tristique libero
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Faucibus porta lacus fringilla vel
                            </li>
                            <li>
                                Aenean sit amet erat nunc
                            </li>
                        </ul>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-4">
                <b-card header="Ordered List" header-tag="h4" class="bg-danger-card">
                    <div class="box-body">
                        <ol class="p-l-25 list-lineheight">
                            <li>
                                Consectetur adipiscing elit
                            </li>
                            <li>
                                Integer molestie lorem at massa
                            </li>
                            <li>
                                Facilisis in pretium nisl aliquet
                            </li>
                            <li>
                                Nulla volutpat aliquam velit
                                <ol>
                                    <li>
                                        Phasellus iaculis
                                    </li>
                                    <li>
                                        Vestibulum laoreet
                                    </li>
                                    <li>
                                        Ac tristique libero
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Faucibus porta lacus fringilla vel
                            </li>
                            <li>
                                Eget porttitor lorem
                            </li>
                        </ol>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "typography",
    mounted: function() {
    },
    destroyed: function() {
    }
}
</script>
<style src="../assets/css/custom_typo.css" scoped></style>
