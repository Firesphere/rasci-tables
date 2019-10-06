<div class="container-full page-background">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content">
                        <h1>ISO27001 RASCI Table</h1>
                        <p>
                            <b>The roles are identified as R, A, S, C or I meaning:</b><br/>
                            <b>Responsible</b> i.e. this role has primary responsibility for performing the activities
                            in this section.<br/>
                            <b>Accountable</b> i.e. this role will be called to account if the risks materialize
                            (usually because preventive controls fail): it is generally the budget holder.<br/>
                            <b>Supportive</b> i.e. this role actively assists with the design, implementation or
                            management of the activities in this section.<br/>
                            <b>Consulted</b> i.e. this is a hands-off role, offering guidance and direction to those
                            more actively involved.<br/>
                            <b>Informed</b> i.e. this role has an interest in the status of the risks in this section
                            and should be kept in touch with the situation.<br/>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="Form_SaveForm" action="$URLSegment/SaveForm/" method="post"
      enctype="application/x-www-form-urlencoded" class="col">

    <% with $Annex %>
        <table class="rasci table-hover table-bordered col table-header-rotated">
            <thead>
            <tr class="alert alert-primary">
                <th colspan="2">Section of ISO/IEC 27001:2013</th>
                <% loop $Teams %>
                    <th class="rotate-45 rasci_team <% if $Last %>last<% end_if %>">
                        <div><span>$Name</span></div>
                    </th>
                <% end_loop %>
                <th class="text-center">References or Owner</th>
                <th class="savebutton"></th>
            </tr>
            </thead>
            <tbody>
                <% loop $AnnexChapters %>
                <tr class="table-info">
                    <td colspan="2"><b>Annex A.{$AnnexNo} $Title</b></td>
                    <% loop $AnnexSet.Teams %><td></td><% end_loop %>
                    <td colspan="2"><a href="$Reference" target="_blank">Reference for Annex $AnnexNo</a></td>
                </tr>
                    <% loop $Subsidiaries %>
                        <% if $SubChapterID %>
                            <% with $SubChapter %>
                            <tr class="alert alert-dark">
                                <td valign="top" class="subsidiary_number" width="80px" align="right"><code>$SubNo</code></td>
                                <td colspan="$Up.AnnexChapter.AnnexSet.TeamCount" class="subsidiary_title">
                                    $Title
                                    $Description
                                </td>
                                <td class="savebutton alert alert-dark"></td>
                            </tr>
                            <% end_with %>
                        <% end_if %>
                    <tr class="$EvenOdd">
                        <td class="subsidiary_number" width="80px" align="right"><code>$SubNo</code></td>
                        <td class="subsidiary_title">$Title</td>
                        <% loop $AnnexChapter.AnnexSet.Teams %>
                            <%--  Yes, we need to go that far up :/--%>
                            <% include SubsidiaryRasci Subsidiary=$Up.Up.Up %>
                        <% end_loop %>
                        <td>$Lead</td>
                        <td class="savebutton">$Top.SaveForm.Actions</td>
                    </tr>
                    <% end_loop %>
                <% end_loop %>
            </tbody>
        </table>
    <% end_with %>
    $SaveForm.Fields.FieldByName('SecurityID')
    $Top.SaveForm.Actions
</form>
<div class="container-full">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content table-total-table">
                        <% include TotalsTable %>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col">&nbsp;</div>
