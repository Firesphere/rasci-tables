<div class="container-full page-background">
    <div class="container">
        <div class="page">
            <div class="row">
                <% if $Menu(2) %>
                    <% include SideBar %>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <% else %>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <% include Breadcrumbs %>
                <% end_if %>
                <div class="content">
                    <% if $Revisions %>
                        <table class="table-hover table-bordered col table-striped">
                            <thead>
                            <tr>
                                <td>Version</td>
                                <td>Revision date</td>
                                <td>Author</td>
                                <td>Sign off</td>
                            </tr>
                            </thead>
                            <tbody>
                                <% loop $Revisions %>
                                <tr>
                                    <td>$Version</td>
                                    <td>$RevisionDate</td>
                                    <td>$Author.Name</td>
                                    <td>$SignOff</td>
                                </tr>
                                <% end_loop %>
                            </tbody>
                        </table>
                    <% end_if %>
                    <% if $ElementalArea %>
                        $ElementalArea
                    <% else %>
                        $Content
                    <% end_if %>
                </div>
                <% if $Subsidiaries %>
                    <div class="content">
                        <hr/>
                        <p>Related ISO/IEC 27001:2013 Annexes</p>
                        <table class="table-hover table-bordered col table-striped">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <% loop $Subsidiaries %>
                                <tr>
                                    <td class="subsidiary_number"><code>$SubNo</code></td>
                                    <td class="subsidiary_title"><a href="$AnnexChapter.Reference"
                                                                    target="_blank">$Title</a></td>
                                </tr>
                                <% end_loop %>
                            </tbody>
                        </table>
                    </div>
                <% end_if %>
                <% if $SiteConfig.ShowPageFooterOptions %>
                    <% include PageFooter %>
                <% end_if %>
            </div>
            </div>
            </div>
        </div>
    </div>
